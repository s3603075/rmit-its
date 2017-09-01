<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TicketsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
