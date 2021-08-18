<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('restapi')->dropIfExists('countries');
        Schema::connection('restapi')->create('countries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('continent_id')->unsigned();
            $table->string('iso', 4);
            $table->string('iso2', 4);
            $table->string('name', 120);
            $table->string('description', 160);
            $table->double('longitude')->nullable()->default(null);
            $table->double('latitude')->nullable()->default(null);
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
        Schema::connection('restapi')->dropIfExists('countries');
    }
}
