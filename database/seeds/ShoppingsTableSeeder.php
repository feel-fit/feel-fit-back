<?php

use Illuminate\Database\Seeder;

class ShoppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Shopping::class, 10)->create();
    }
}
