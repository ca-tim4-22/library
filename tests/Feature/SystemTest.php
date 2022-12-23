<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class AdminExists extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_exists()
    {
        $response = $this->post('/uloguj-se', [
            'email' => 'admin@gmail.com',
            'password' => 'nekalozinka'
        ]);
 
        $this->assertAuthenticated();
    }
 
    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $this->post('/uloguj-se', [
            'email' => 'admin@gmail.com',
            'password' => 'wrong-password',
        ]);
 
        $this->assertGuest();
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@ets-pg.edu.me',
            'JMBG' => '8675768256079',
            'username' => 'username',
            'password' => 'password',
            'password_confirmation' => 'password'
            // 'user_type_id' => '3',
            // 'user_gender_id' => '1',
            // 'photo' => 'placeholder',
            // 'remember_token' => '312334283',
            // 'login_count' => 1,
            // 'last_login_at' => now(),
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
