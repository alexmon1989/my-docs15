<?php

class ServicesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('services')->delete();
        
        Service::create(array(
                'title' => 'Регистрация иностранных граждан по месту пребывания',
                'full_text' => 'Полный текст статьи',
                'service_category_id' => 2,
            )
        );
        
        Service::create(array(
                'title' => 'Регистрация граждан РФ по месту пребывания и по месту жительства',
                'full_text' => 'Полный текст статьи',
                'service_category_id' => 2,
            )
        );
    }
}