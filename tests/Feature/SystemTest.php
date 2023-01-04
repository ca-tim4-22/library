<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

// use Illuminate\Foundation\Testing\RefreshDatabase;

//! Change APP_ENV to "testing" in .env file
//* APP_ENV=testing

class SystemTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_test_user_delete_function()
    {
        $user = User::create([
            'name' => 'Test user',
        ])->delete();

        $this->assertTrue(true);
    }

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/pocetna');
        $response->assertStatus(200);
    }

    public function test_admin_user_exists()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Administrator'
        ]);
    }

    public function test_user_types_exists()
    {
        $this->assertDatabaseHas('user_types', [
            'name' => 'student',
            'name' => 'librarian',
            'name' => 'administrator',
        ]);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $this->post('/uloguj-se', [
            'email'    => 'admin@gmail.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_register_page_status()
    {
        $response = $this->get('/register');
        $response->assertDontSee('Sva prava zadržana');
        $response->assertStatus(404);
    }
}
