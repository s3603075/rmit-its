<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Ticket;

class CommentsTableSeeder extends Seeder
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
            Comment::create([
                'ticket_id' => $faker->randomElement(Ticket::pluck('id')->toArray()),
                'body' => $faker->paragraph
            ]);
        }
    }
}
