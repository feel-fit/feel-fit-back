<?php

use App\Models\StatusOrder;
use Illuminate\Database\Seeder;

class StatusOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        StatusOrder::create(['name'=>'pendiente']);
        StatusOrder::create(['name'=>'procesando']);
        StatusOrder::create(['name'=>'facturado']);
        StatusOrder::create(['name'=>'enviado']);
        StatusOrder::create(['name'=>'completo']);
        factory(\App\Models\StatusOrder::class, 10)->create();
    }
}
