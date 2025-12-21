<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['creator', 'category'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
        fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
            )
        );

        $query->when(
                $filters['category'] ?? false,
                fn($query, $category) =>
                $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when(
                $filters['creator'] ?? false,
                fn($query, $creator) =>
                $query->whereHas('creator', fn($query) =>
                $query->where('name', 'like', '%' . $creator . '%')
            )
        );
    }

    public function registrants()
    {
        return $this->hasMany(Registrant::class, 'event_id');
    }
}
