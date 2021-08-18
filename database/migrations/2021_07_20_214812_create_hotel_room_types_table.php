<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('restapi')->dropIfExists('hotel_room_types');
        Schema::connection('restapi')->create('hotel_room_types', function (Blueprint $table) {
            $table->id();
            $table->string('api_code', 12);
            $table->bigInteger('hotel_id')->unsigned();
            $table->string('room_type');
            $table->integer('max_occupancy_per_room')->default(1)->unsigned();
            $table->integer('no_of_room')->default(0)->unsigned();
            $table->integer('size_of_room')->default(0)->unsigned();
            $table->boolean('room_size_incl_terrace')->default(false);
            $table->string('views',120)->nullable()->default(null);
            $table->integer('max_extrabeds')->default(0)->unsigned();
            $table->integer('max_infant_in_room')->default(0)->unsigned();
            $table->string('room_type_picture')->nullable()->default(null);
            $table->string('bed_type', 800)->nullable()->default(null);
            $table->boolean('shared_bathroom')->default(false);
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
        Schema::connection('restapi')->dropIfExists('hotel_room_types');
    }
}
