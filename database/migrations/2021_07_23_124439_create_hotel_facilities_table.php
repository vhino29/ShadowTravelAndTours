<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('restapi')->dropIfExists('hotel_facilities');
        Schema::connection('restapi')->create('hotel_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('api_code', 12);
            $table->bigInteger('hotel_id')->unsigned();
            $table->string('name',120);
            $table->string('group_description',160)->nullable()->default(null);
            $table->bigInteger('auid')->nullable()->default(null)->unsigned();
            $table->bigInteger('uuid')->nullable()->default(null)->unsigned();
            $table->bigInteger('duid')->nullable()->default(null)->unsigned();
            $table->timestamps();
            $table->SoftDeletes();
            $table->boolean('is_updated')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('restapi')->dropIfExists('hotel_facilities');
    }
}
