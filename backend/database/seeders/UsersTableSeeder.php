<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 20 random users
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'uuid' => Str::uuid(),
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'), // default password
                'role' => $faker->randomElement(['user', 'author']),
                'author_status' => $faker->randomElement(['pending', 'approved', 'requested', 'rejected']),
                'is_admin' => $faker->boolean(20), // 20% chance to be admin
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'image' => $faker->imageUrl(200, 200, 'people'), // placeholder image
                'more_info' => json_encode([
                    'bio' => $faker->sentence(),
                    'website' => $faker->url()
                ]),
            ]);
        }
    }
}
