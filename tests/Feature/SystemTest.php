<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class SystemTest extends TestCase
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
        $password = Str::random(10);

        if (!User::where('username', 'username')->exists()) {
            $response = $this->post('/register', [
                'name' => 'Test User',
                'email' => 'test@ets-pg.edu.me',
                'JMBG' => '8675768256079',
                'username' => 'username',
                'password' => $password,
                'password_confirmation' => $password
            ]);
     
            $this->assertAuthenticated();
        } else {
            $this->markTestSkipped('this test has already passed');
        }
    }
}
