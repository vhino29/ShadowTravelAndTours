<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('restapi')->dropIfExists('hotel_pictures');
        Schema::connection('restapi')->create('hotel_pictures', function (Blueprint $table) {
            $table->id();
            $table->string('api_code', 12);
            $table->bigInteger('hotel_id')->unsigned();
            $table->string('url');
            $table->string('caption',120)->nullable()->default(null);
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
        Schema::connection('restapi')->dropIfExists('hotel_pictures');
    }
}
