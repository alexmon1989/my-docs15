<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCentres extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('centres', function ($table) {
                $table->text('add_data')->after('longtitude')->nullable();
                $table->text('how_to_get')->after('add_data')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('centres', function ($table) {
                $table->dropColumn('add_data');
                $table->dropColumn('how_to_get');
            });
	}

}
