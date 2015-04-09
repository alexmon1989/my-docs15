<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('documents', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('document_category_id')->unsigned();
                $table->string('file');
                $table->float('size');
                $table->timestamps();
                
                $table->foreign('document_category_id')
                    ->references('id')
                    ->on('documents_categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::dropIfExists('documents');
	}

}
