<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('restapi')->dropIfExists('continents');
        Schema::connection('restapi')->create('continents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('description', 160);
            $table->bigInteger('auid')->nullable()->default(null)->unsigned();
            $table->bigInteger('uuid')->nullable()->default(null)->unsigned();
            $table->bigInteger('duid')->nullable()->default(null)->unsigned();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('restapi')->dropIfExists('continents');
    }
}
