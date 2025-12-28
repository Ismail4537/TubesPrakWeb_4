<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Registrant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EventRegistrantsTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_creator_non_admin_cannot_view_registrants(): void
    {
        $event = Event::factory()->create();
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get(route('event.registrants.index', ['event' => $event->id]))
            ->assertStatus(403);
    }

    public function test_creator_can_view_registrants(): void
    {
        $creator = User::factory()->create(['role' => 'user']);
        $event = Event::factory()->create(['creator_id' => $creator->id]);
        $registrantUser = User::factory()->create();
        DB::table('registrants')->insert([
            'user_id' => $registrantUser->id,
            'event_id' => $event->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->actingAs($creator)
            ->get(route('event.registrants.index', ['event' => $event->id]))
            ->assertOk()
            ->assertSee($registrantUser->name);
    }

    public function test_admin_can_delete_registrant(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $event = Event::factory()->create();
        $registrantUser = User::factory()->create();

        DB::table('registrants')->insert([
            'user_id' => $registrantUser->id,
            'event_id' => $event->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->actingAs($admin)
            ->delete(route('event.registrants.destroy', ['event' => $event->id, 'user' => $registrantUser->id]))
            ->assertStatus(302);

        $this->assertDatabaseMissing('registrants', [
            'user_id' => $registrantUser->id,
            'event_id' => $event->id,
        ]);
    }
}
