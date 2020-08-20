<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class addCities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'ARMENIA (CENTRO/NORTE)', 'department_id' => '24'],
            ['name' => 'CORREGIMIENTO  DEL CAIMO', 'department_id' => '24'],
            ['name' => 'VIA TEBAIDA', 'department_id' => '24']
        ]);
    }
}
