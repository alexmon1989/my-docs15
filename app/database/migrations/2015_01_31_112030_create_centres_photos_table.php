<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentresPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('centres_photos', function(Blueprint $table) {
                $table->integer('centre_id')->unsigned();
                $table->integer('photo_id')->unsigned();
                
                $table->foreign('centre_id')
                    ->references('id')->on('centres')
                    ->onDelete('cascade');
                $table->foreign('photo_id')
                    ->references('id')->on('photos')
                    ->onDelete('cascade');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::dropIfExists('centres_photos');
	}
}
