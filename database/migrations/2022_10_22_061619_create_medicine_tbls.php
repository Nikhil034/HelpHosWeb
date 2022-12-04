<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTbls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_tbls', function (Blueprint $table) {
            $table->id();
            $table->String('drug_id');
            $table->String('drug_name');
            $table->String('drug_use');
            $table->String('drug_quantity');
            $table->String('drug_price');
            $table->tinyInteger('Isavaible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_tbls');
    }
}
