<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'email' => $faker->unique()->email,
                'name' => $faker->userName,
                'password' => $faker->password

            ]);
        }
    }
}
