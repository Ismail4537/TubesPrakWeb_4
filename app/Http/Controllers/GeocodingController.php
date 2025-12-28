<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GeocodingController extends Controller
{
    public function nominatimSearch(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        if (mb_strlen($q) < 3) {
            return response()->json([]);
        }

        $cacheKey = 'nominatim:search:' . md5(mb_strtolower($q));

        $results = Cache::remember($cacheKey, now()->addDay(), function () use ($q) {
            $baseUrl = 'https://nominatim.openstreetmap.org/search';

            $response = Http::timeout(8)
                ->retry(2, 200)
                ->withHeaders([
                    // Nominatim usage policy requires a valid User-Agent identifying the application.
                    'User-Agent' => 'AcarraTicketing/1.0 (+' . config('app.url') . ')',
                    'Accept-Language' => 'id,en;q=0.8',
                ])
                ->get($baseUrl, [
                    'format' => 'jsonv2',
                    'q' => $q,
                    'addressdetails' => 1,
                    'limit' => 5,
                ]);

            if (!$response->ok()) {
                return [];
            }

            $data = $response->json();
            if (!is_array($data)) {
                return [];
            }

            return collect($data)
                ->map(function ($item) {
                    return [
                        'place_id' => $item['place_id'] ?? null,
                        'display_name' => $item['display_name'] ?? null,
                        'lat' => $item['lat'] ?? null,
                        'lon' => $item['lon'] ?? null,
                    ];
                })
                ->filter(fn($x) => !empty($x['display_name']))
                ->values()
                ->all();
        });

        return response()->json($results);
    }

    public function nominatimReverse(Request $request)
    {
        $lat = $request->query('lat');
        $lon = $request->query('lon');

        if (!is_numeric($lat) || !is_numeric($lon)) {
            return response()->json(['message' => 'Invalid coordinates.'], 422);
        }

        $lat = (float) $lat;
        $lon = (float) $lon;

        if ($lat < -90 || $lat > 90 || $lon < -180 || $lon > 180) {
            return response()->json(['message' => 'Invalid coordinates.'], 422);
        }

        $cacheKey = 'nominatim:reverse:' . md5($lat . ',' . $lon);

        $result = Cache::remember($cacheKey, now()->addDays(7), function () use ($lat, $lon) {
            $baseUrl = 'https://nominatim.openstreetmap.org/reverse';

            $response = Http::timeout(8)
                ->retry(2, 200)
                ->withHeaders([
                    'User-Agent' => 'AcarraTicketing/1.0 (+' . config('app.url') . ')',
                    'Accept-Language' => 'id,en;q=0.8',
                ])
                ->get($baseUrl, [
                    'format' => 'jsonv2',
                    'lat' => $lat,
                    'lon' => $lon,
                    'zoom' => 18,
                    'addressdetails' => 1,
                ]);

            if (!$response->ok()) {
                return null;
            }

            $data = $response->json();
            if (!is_array($data)) {
                return null;
            }

            return [
                'place_id' => $data['place_id'] ?? null,
                'display_name' => $data['display_name'] ?? null,
                'lat' => $data['lat'] ?? $lat,
                'lon' => $data['lon'] ?? $lon,
            ];
        });

        if (!$result || empty($result['display_name'])) {
            return response()->json(['message' => 'Address not found.'], 404);
        }

        return response()->json($result);
    }
}
