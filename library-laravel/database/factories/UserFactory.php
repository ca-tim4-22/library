<?php

namespace Database\Factories;

use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $password = Str::random(10);

        return [
            'name' => fake()->name(),
            'username' => fake()->name(),
            'user_type_id' => UserType::all()->random(),
            'JMBG' => $this->faker->numberBetween(11111111111111, 99999999999999),
            'email' => fake()->safeEmail(),
            'email_verified_at' => Carbon::now(),
            'photo' => 'placeholder',
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
            'login_count' => 1,
            'last_login_at' => Carbon::now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
