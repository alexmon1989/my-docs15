<?php

class LinksTableSeeder extends Seeder {
    public function run()
    {
        DB::table('links')->truncate();
        
        Link::create(array(
                'title' => 'Госуслуги',
                'image' => '1.jpg',
                'url' => 'https://www.gosuslugi.ru/'
            )
        );
        
        Link::create(array(
                'title' => 'Универсальная электронная карта',
                'image' => '2.jpg',
                'url' => 'https://уэк-воронеж.рф/'
            )
        );
        
        Link::create(array(
                'title' => 'Ваш контроль',
                'image' => '3.jpg',
                'url' => 'https://vashkontrol.ru/'
            )
        );
    }
}