<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pins = \App\Tag::create([
            'name' => 'pins'
        ]);

        $boards = \App\Tag::create([
            'name' => 'boards'
        ]);

        $categories = \App\Tag::create([
            'name' => 'categories'
        ]);
    }
}
