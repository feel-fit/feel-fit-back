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
        
        StatusOrder::create(['pendiente']);
        StatusOrder::create(['procesando']);
        StatusOrder::create(['facturado']);
        StatusOrder::create(['enviado']);
        StatusOrder::create(['completo']);
        factory(\App\Models\StatusOrder::class, 10)->create();
    }
}
