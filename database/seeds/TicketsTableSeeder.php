<?php

use Illuminate\Database\Seeder;
use App\Ticket;

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
                'email' => $faker->unique()->email,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'issue' => $faker->paragraph(3,true),
                'OS' => "Windows",
                'status' => "Pending"
            ]);
        }
    }
}
