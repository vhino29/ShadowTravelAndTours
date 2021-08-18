<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaCityWithAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('city_with_areas', 'agoda_area_id')){
            Schema::connection('restapi')->table('city_with_areas', function (Blueprint $table) {
                $table->integer('agoda_area_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('city_with_areas', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('city_with_areas', function (Blueprint $table) {
                $table->integer('agoda_active_hotels')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('city_with_areas', 'agoda_polygon')){
            Schema::connection('restapi')->table('city_with_areas', function (Blueprint $table) {
                $table->text('agoda_polygon')->nullable()->default(null);
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
        if(Schema::connection('restapi')->hasColumn('city_with_areas', 'agoda_area_id')){
            Schema::connection('restapi')->table('city_with_areas', function (Blueprint $table) {
                $table->dropColumn('agoda_area_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('city_with_areas', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('city_with_areas', function (Blueprint $table) {
                $table->dropColumn('agoda_active_hotels');
            });
        }

        if(Schema::connection('restapi')->hasColumn('city_with_areas', 'agoda_polygon')){
            Schema::connection('restapi')->table('city_with_areas', function (Blueprint $table) {
                $table->dropColumn('agoda_polygon');
            });
        }
    }
}
