<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('centres', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('hot_line')->nullable();
                $table->string('address')->nullable();   
                $table->string('call_centre')->nullable(); 
                $table->string('email')->nullable();    
                $table->string('director')->nullable(); 
                $table->float('latitude')->nullable(); 
                $table->float('longtitude')->nullable(); 
                
                // created_at, updated_at
                $table->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::dropIfExists('centres');
	}

}
