<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentresFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('centres_files', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('centre_id')->unsigned();
                $table->string('file_name');
                $table->timestamps();
                
                $table->foreign('centre_id')
                    ->references('id')->on('centres')
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
            Schema::dropIfExists('centres_files');
	}

}
