<?php

use Illuminate\Database\Seeder;

class NutritionalFactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\NutritionalFact::class, 2000)->create();
    }
}
