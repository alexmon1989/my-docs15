<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVacanciesFieldToCentres extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('centres', function ($table) {
                $table->text('vacancies')->after('how_to_get')->nullable();
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
                $table->dropColumn('vacancies');
            });
	}

}
