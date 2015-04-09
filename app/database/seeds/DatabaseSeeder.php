<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CarouselTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('GlobalServiceCategoriesTableSeeder');
		$this->call('ServiceCategoriesTableSeeder');
		$this->call('ServicesTableSeeder');
		$this->call('CentresTableSeeder');
		$this->call('MembersTableSeeder');
		$this->call('LinksTableSeeder');
                $this->call('DocumentsCategoriesTableSeeder');
		$this->call('VideosTableSeeder');
		$this->call('PressTableSeeder');
                
                $this->call('UsersTableSeeder');
	}

}
