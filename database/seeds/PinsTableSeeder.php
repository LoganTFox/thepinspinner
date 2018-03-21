<?php

use Illuminate\Database\Seeder;

class PinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pin::class, 20)->create();
    }
}
