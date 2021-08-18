<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaContinents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('continents', 'agoda_continent_id')){
            Schema::connection('restapi')->table('continents', function (Blueprint $table) {
                $table->integer('agoda_continent_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('continents', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('continents', function (Blueprint $table) {
                $table->integer('agoda_active_hotels')->nullable()->default(null)->unsigned();
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
        if(Schema::connection('restapi')->hasColumn('continents', 'agoda_continent_id')){
            Schema::connection('restapi')->table('continents', function (Blueprint $table) {
                $table->dropColumn('agoda_continent_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('continents', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('continents', function (Blueprint $table) {
                $table->dropColumn('agoda_active_hotels');
            });
        }
    }
}
