<?php

namespace Tests;

use App\Models\Esemeny;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EsemenyTest extends TestCase
{
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_getSpecificEvent(): void
    {
        $event = Esemeny::factory()->create();
        $eventId = $event->esemeny_id;
        $response = $this->get("http://localhost:8000/api/specific-events/$eventId");
        $response->assertStatus(200);
        $response_esemeny = $response->json();
        $this->assertEquals($eventId, $response_esemeny[0]['esemeny_id']);
    }

    public function test_getTopUserEvents(): void
    {
        $event = Esemeny::factory()->create();
        $userId = $event->user_id;
        $response = $this->get("http://localhost:8000/api/topevents/$userId");
        $response->assertStatus(200);
        $response_esemeny = $response->json();
        $this->assertCount(3, $response_esemeny);
        $this->assertEquals($userId, $response_esemeny[0]['user_id']);
        $this->assertEquals($userId, $response_esemeny[1]['user_id']);
        $this->assertEquals($userId, $response_esemeny[2]['user_id']);
    }
}

