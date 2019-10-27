<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtrosGenderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table("users", function ($table) {
            $table->enum('gender', ['masculino', 'femenino', 'otro'])->default('otro')->change();
        });*/
    
        DB::statement("ALTER TABLE users MODIFY COLUMN gender ENUM('masculino', 'femenino', 'otro') NOT NULL DEFAULT 'otro'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN gender ENUM('masculino', 'femenino', 'otro') NOT NULL DEFAULT 'masculino'");
    }
}
