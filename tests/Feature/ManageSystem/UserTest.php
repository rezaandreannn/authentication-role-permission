<?php

namespace Tests\Feature\ManageSystem;

use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rendered_user()
    {
        // Membuat pengguna palsu dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/user');
        $response->assertStatus(200);
    }

    public function test_rendered_user_not_login()
    {
        $response = $this->get('/user');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
