<?php

class CarouselTableSeeder extends Seeder {
    public function run()
    {
        DB::table('carousel')->truncate();
        
        Carousel::create(array(
                'title' => 'Слайдер 1',
                'description' => 'Описание слайдера 1',
                'filename' => '1.gif',
                'order' => '1',
                'enabled' => TRUE,
            )
        );
        
        Carousel::create(array(
                'title' => 'Слайдер 2',
                'description' => 'Описание слайдера 2',
                'filename' => '2.gif',
                'order' => '2',
                'enabled' => TRUE,
            )
        );
        
        Carousel::create(array(
                'title' => 'Слайдер 3',
                'description' => 'Описание слайдера 3',
                'filename' => '3.gif',
                'order' => '3',
                'enabled' => TRUE,
            )
        );
        
        Carousel::create(array(
                'title' => 'Слайдер 4',
                'description' => 'Описание слайдера 4',
                'filename' => '4.gif',
                'order' => '4',
                'enabled' => FALSE,
            )
        );
    }
}