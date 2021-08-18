<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::connection('restapi')->hasColumn('countries', 'agoda_country_id')){
            Schema::connection('restapi')->table('countries', function (Blueprint $table) {
                $table->integer('agoda_country_id')->nullable()->default(null)->unsigned();
            });
        }

        if(!Schema::connection('restapi')->hasColumn('countries', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('countries', function (Blueprint $table) {
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
        if(Schema::connection('restapi')->hasColumn('countries', 'agoda_country_id')){
            Schema::connection('restapi')->table('countries', function (Blueprint $table) {
                $table->dropColumn('agoda_country_id');
            });
        }

        if(Schema::connection('restapi')->hasColumn('countries', 'agoda_active_hotels')){
            Schema::connection('restapi')->table('countries', function (Blueprint $table) {
                $table->dropColumn('agoda_active_hotels');
            });
        }
    }
}
