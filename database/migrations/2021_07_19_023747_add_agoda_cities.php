<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('cities', 'agoda_city_id')){
            Schema::connection('restapi')->table('cities', function (Blueprint $table) {
                $table->integer('agoda_city_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('cities', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('cities', function (Blueprint $table) {
                $table->integer('agoda_active_hotels')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('cities', 'agoda_no_area')){
            Schema::connection('restapi')->table('cities', function (Blueprint $table) {
                $table->integer('agoda_no_area')->nullable()->default(null)->unsigned();
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
        if(Schema::connection('restapi')->hasColumn('cities', 'agoda_city_id')){
            Schema::connection('restapi')->table('cities', function (Blueprint $table) {
                $table->dropColumn('agoda_city_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('cities', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('cities', function (Blueprint $table) {
                $table->dropColumn('agoda_active_hotels');
            });
        }

        if(Schema::connection('restapi')->hasColumn('cities', 'agoda_no_area')){
            Schema::connection('restapi')->table('cities', function (Blueprint $table) {
                $table->dropColumn('agoda_no_area');
            });
        }
    }
}
