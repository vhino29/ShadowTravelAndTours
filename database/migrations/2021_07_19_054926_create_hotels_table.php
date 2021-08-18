<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('restapi')->dropIfExists('hotels');
        Schema::connection('restapi')->create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('api_code', 12);
            $table->bigInteger('city_id')->unsigned();
            $table->string('name', 120);
            $table->string('address_line_1')->nullable()->default(null);
            $table->string('address_line_2')->nullable()->default(null);
            $table->string('postal_code', 20)->nullable()->default(null);
            $table->string('state', 120)->nullable()->default(null);
            $table->string('city', 120)->nullable()->default(null);
            $table->string('country', 120)->nullable()->default(null);
            $table->float('star_rating')->nullable()->default(null);
            $table->integer('popularity_score')->nullable()->default(null)->unsigned();
            $table->integer('number_of_reviews')->nullable()->default(null)->unsigned();
            $table->float('rating_average')->nullable()->default(null);
            $table->text('overview')->nullable()->default(null);
            $table->double('longitude')->nullable()->default(null);
            $table->double('latitude')->nullable()->default(null);
            $table->integer('infant_age')->nullable()->default(null)->unsigned();
            $table->integer('children_age_from')->nullable()->default(null)->unsigned();
            $table->integer('children_age_to')->nullable()->default(null)->unsigned();
            $table->boolean('children_stay_free')->default(false);
            $table->integer('min_guest_age')->nullable()->default(null)->unsigned();
            $table->string('accommodation_type', 40)->nullable()->default(null);
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
        Schema::connection('restapi')->dropIfExists('hotels');
    }
}
