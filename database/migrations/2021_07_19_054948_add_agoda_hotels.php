<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaHotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('hotels', 'agoda_hotel_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->integer('agoda_hotel_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotels', 'agoda_continent_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->integer('agoda_continent_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotels', 'agoda_country_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->integer('agoda_country_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotels', 'agoda_city_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->integer('agoda_city_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotels', 'agoda_area_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->integer('agoda_area_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('hotels', 'agoda_hotel_url')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->string('agoda_hotel_url')->nullable()->default(null);
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
        if(Schema::connection('restapi')->hasColumn('hotels', 'agoda_hotel_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->dropColumn('agoda_hotel_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotels', 'agoda_continent_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->dropColumn('agoda_continent_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotels', 'agoda_country_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->dropColumn('agoda_country_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotels', 'agoda_city_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->dropColumn('agoda_city_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotels', 'agoda_area_id')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->dropColumn('agoda_area_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('hotels', 'agoda_hotel_url')){
            Schema::connection('restapi')->table('hotels', function (Blueprint $table) {
                $table->dropColumn('agoda_hotel_url');
            });
        }
    }
}
