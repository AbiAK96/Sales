<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Representative;
class RepresentativeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the creation of a Representative.
     *
     * @return void
     */
    public function testCreateRepresentative()
    {
        $data = [
            'name' => 'Sample name',
            'email' => 9.99,
            'telephone' => 'This is a sample telephone.',
            'route' => 'This is a sample route.',
            'join_date' => 'This is a sample join_date.',
            'comments' => 'comments'
        ];

        $response = $this->post('/representatives', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('representatives', $data);
    }

    /**
     * Test the retrieval of a representative.
     *
     * @return void
     */
    public function testRetrieveRepresentative()
    {
        $representative = Representative::factory()->create();

        $response = $this->get('/representatives/' . $representative->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $representative->id,
                'name' => $representative->name,
                'email' => $representative->price,
                'route' => $representative->route,
            ]);
    }

    /**
     * Test the update of a representative.
     *
     * @return void
     */
    public function testUpdateRepresentative()
    {
        $representative = Representative::factory()->create();

        $data = [
            'name' => 'Updated Representative',
            'email' => 'email',
            'route' => 'route.',
        ];

        $response = $this->put('/representatives/' . $representative->id, $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('representatives', $data);
    }

    /**
     * Test the deletion of a representative.
     *
     * @return void
     */
    public function testDeleteRepresentative()
    {
        $representative = Representative::factory()->create();

        $response = $this->delete('/representatives/' . $representative->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('representative', ['id' => $representative->id]);
    }
}
