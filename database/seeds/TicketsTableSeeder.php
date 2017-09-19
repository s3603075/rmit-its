<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\User;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create tickets faker
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Ticket::create([
                'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
                'email' => $faker->randomElement(User::pluck('email')->toArray()),
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'issue' => $faker->paragraph(3,true),
                'OS' => "Windows",
                'status' => "Pending"
            ]);
        }
    }
}
