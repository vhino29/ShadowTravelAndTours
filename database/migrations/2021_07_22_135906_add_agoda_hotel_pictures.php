<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaHotelPictures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('hotel_pictures', 'agoda_picture_id')){
            Schema::connection('restapi')->table('hotel_pictures', function (Blueprint $table) {
                $table->integer('agoda_picture_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotel_pictures', 'agoda_hotel_id')){
            Schema::connection('restapi')->table('hotel_pictures', function (Blueprint $table) {
                $table->integer('agoda_hotel_id')->nullable()->default(null)->unsigned();
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
        if(Schema::connection('restapi')->hasColumn('hotel_pictures', 'agoda_picture_id')){
            Schema::connection('restapi')->table('hotel_pictures', function (Blueprint $table) {
                $table->dropColumn('agoda_picture_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotel_pictures', 'agoda_hotel_id')){
            Schema::connection('restapi')->table('hotel_pictures', function (Blueprint $table) {
                $table->dropColumn('agoda_hotel_id');
            });
        }
    }
}
