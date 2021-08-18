<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaHotelRoomTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('hotel_room_types', 'agoda_hotel_room_type_id')){
            Schema::connection('restapi')->table('hotel_room_types', function (Blueprint $table) {
                $table->integer('agoda_hotel_room_type_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotel_room_types', 'agoda_hotel_id')){
            Schema::connection('restapi')->table('hotel_room_types', function (Blueprint $table) {
                $table->integer('agoda_hotel_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotel_room_types', 'agoda_master_room_type_id')){
            Schema::connection('restapi')->table('hotel_room_types', function (Blueprint $table) {
                $table->integer('agoda_master_room_type_id')->nullable()->default(null)->unsigned();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::connection('restapi')->hasColumn('hotel_room_types', 'agoda_hotel_room_type_id')){
            Schema::connection('restapi')->table('hotel_room_types', function (Blueprint $table) {
                $table->dropColumn('agoda_hotel_room_type_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotel_room_types', 'agoda_hotel_id')){
            Schema::connection('restapi')->table('hotel_room_types', function (Blueprint $table) {
                $table->dropColumn('agoda_hotel_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotel_room_types', 'agoda_master_room_type_id')){
            Schema::connection('restapi')->table('hotel_room_types', function (Blueprint $table) {
                $table->dropColumn('agoda_master_room_type_id');
            });
        }
    }
}
