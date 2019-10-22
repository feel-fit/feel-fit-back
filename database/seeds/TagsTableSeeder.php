<?php

use App\Models\Tag;
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
        Tag::create(['name'=>'yogurt']);
        Tag::create(['name'=>'colour greek']);
        Tag::create(['name'=>'litro']);
        Tag::create(['name'=>'dulce sin sabor']);
        Tag::create(['name'=>'yogurt griego']);
    }
}
