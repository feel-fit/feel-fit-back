<?php

use Illuminate\Database\Seeder;

class DetailShoppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DetailShopping::class, 10)->create();
    }
}
