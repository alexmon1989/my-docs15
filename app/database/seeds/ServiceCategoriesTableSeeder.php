<?php

class ServiceCategoriesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('service_categories')->delete();
        
        ServiceCategory::create(array(
                'title' => 'Паспорт Российской Федерации',
                'image' => '1.png',
                'global_service_category_id' => 1,
            )
        );
        
        ServiceCategory::create(array(
                'title' => 'Смена места жительства',
                'image' => '2.png',
                'global_service_category_id' => 1,
            )
        );
        
        ServiceCategory::create(array(
                'title' => 'Заграничный паспорт',
                'image' => '3.png',
                'global_service_category_id' => 1,
            )
        );
    }
}