<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Venue;

class VenueTest extends TestCase
{
    public function test_can_get_all_venues_authenticated()
    {
        $user = User::factory()->create(); // Assuming User model
    
        // Act as a logged-in user (replace with your framework's syntax if different)
        $this->actingAs($user);
    
        $this->get('/venue')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [], // Array or object depending on your response
            ]);
    }
    



    public function test_can_create_venue()
    {
        $data = [
            'venue_title' => 'Test Venue',
            'venue_description' => 'This is a test venue description.',
            'venue_location' => 'Test Location',
        ];

        $this->post('/venue', $data)
            ->assertRedirect('/venue_manage')
            ->assertSessionHas('message', 'Venue Created Successfully!');

        $this->assertDatabaseHas('venues', $data);
    }

    public function test_venue_creation_validates_required_fields()
    {
        $data = []; // Empty data

        $this->post('/venue', $data)
            ->assertStatus(302) // Redirect
            ->assertSessionHasErrors([
                'venue_title' => 'The venue title field is required.',
                'venue_description' => 'The venue description field is required.',
                'venue_location' => 'The venue location field is required.',
            ]);
    }

    public function test_can_update_venue()
    {
        $venue = Venue::factory()->create();

        $data = [
            'venue_title' => 'Updated Venue',
            'venue_description' => 'Updated venue description.',
            'venue_location' => 'Updated Location',
        ];

        $this->put("/venue/$venue->id", $data)
            ->assertRedirect('/venue_manage')
            ->assertSessionHas('message', 'Venue Updated Successfully!');

        $this->assertDatabaseHas('venues', $data);
    }

    public function test_can_delete_venue()
    {
        $venue = Venue::factory()->create();

        $this->delete("/venue/$venue->id")
            ->assertRedirect('/venue_manage')
            ->assertSessionHas('message', 'Venue Deleted Successfully!');

        $this->assertDeleted($venue);
    }
}
