<?php

class CentresTableSeeder extends Seeder {
    public function run()
    {
        DB::table('centres')->delete();
        
        // 1
        $c = new Centre;
        $c->title = 'г. Владикавказ, проспект Коста, 15';
        $c->hot_line = '+7 (867) 270-77-23';
        $c->address = 'г. Владикавказ, проспект Коста, 15';
        $c->call_centre = '+7 (867) 270-77-23';
        $c->email = 'info@mfc15.ru';
        $c->director = 'Иванов Иван Иваныч';
        $c->latitude = 43.02302994;
        $c->longtitude = 44.59566478;
        $c->save();
        
        $photos = array(
            new Photo(array('file_name' => '1.gif', 'order' => 0)),
            new Photo(array('file_name' => '2.gif', 'order' => 1)),
            new Photo(array('file_name' => '3.gif', 'order' => 2))
        );
        $c->photos()->saveMany($photos);
        
        // 2
        $c = new Centre;
        $c->title = 'г. Владикавказ, ул. Коцоева, 17';
        $c->hot_line = '+7 (867) 270-77-23';
        $c->address = 'г. Владикавказ, ул. Коцоева, 17';
        $c->call_centre = '+7 (867) 270-77-23';
        $c->email = 'info@mfc15.ru';
        $c->director = 'Петров Петр Петрович';
        $c->latitude = 43.02302994;
        $c->longtitude = 44.59566478;
        $c->save();
        
        $photos = array(
            new Photo(array('file_name' => '1.gif', 'order' => 0)),
            new Photo(array('file_name' => '2.gif', 'order' => 1)),
            new Photo(array('file_name' => '3.gif', 'order' => 2))
        );
        $c->photos()->saveMany($photos);
        
        // 3
        $c = new Centre;
        $c->title = 'г. Владикавказ, ул. Кутузова, 104 б';
        $c->hot_line = '+7 (867) 270-77-23';
        $c->address = 'г. Владикавказ, ул. Кутузова, 104 б';
        $c->call_centre = '+7 (867) 270-77-23';
        $c->email = 'info@mfc15.ru';
        $c->director = 'Петров Петр Петрович';
        $c->latitude = 43.02302994;
        $c->longtitude = 44.59566478;
        $c->save();
        
        $photos = array(
            new Photo(array('file_name' => '1.gif', 'order' => 0)),
            new Photo(array('file_name' => '2.gif', 'order' => 1)),
            new Photo(array('file_name' => '3.gif', 'order' => 2))
        );
        $c->photos()->saveMany($photos);
        
        // 4
        $c = new Centre;
        $c->title = 'с. Эльхотово, ул. Кирова';
        $c->hot_line = '+7 (867) 270-77-23';
        $c->address = 'с. Эльхотово, ул. Кирова';
        $c->call_centre = '+7 (867) 270-77-23';
        $c->email = 'info@mfc15.ru';
        $c->director = 'Петров Петр Петрович';
        $c->latitude = 43.02302994;
        $c->longtitude = 44.59566478;
        $c->save();
        
        $photos = array(
            new Photo(array('file_name' => '1.gif', 'order' => 0)),
            new Photo(array('file_name' => '2.gif', 'order' => 1)),
            new Photo(array('file_name' => '3.gif', 'order' => 2))
        );
        $c->photos()->saveMany($photos);
        
        // 5
        $c = new Centre;
        $c->title = 'с. Чикола, ул. Сталина';
        $c->hot_line = '+7 (867) 270-77-23';
        $c->address = 'с. Чикола, ул. Сталина';
        $c->call_centre = '+7 (867) 270-77-23';
        $c->email = 'info@mfc15.ru';
        $c->director = 'Петров Петр Петрович';
        $c->latitude = 43.02302994;
        $c->longtitude = 44.59566478;
        $c->save();
        
        $photos = array(
            new Photo(array('file_name' => '1.gif', 'order' => 0)),
            new Photo(array('file_name' => '2.gif', 'order' => 1)),
            new Photo(array('file_name' => '3.gif', 'order' => 2))
        );
        $c->photos()->saveMany($photos);
        
        // 6
        $c = new Centre;
        $c->title = 'г. Моздок, ул. 50 лет Октября, 44';
        $c->hot_line = '+7 (867) 270-77-23';
        $c->address = 'г. Моздок, ул. 50 лет Октября, 44';
        $c->call_centre = '+7 (867) 270-77-23';
        $c->email = 'info@mfc15.ru';
        $c->director = 'Петров Петр Петрович';
        $c->latitude = 43.02302994;
        $c->longtitude = 44.59566478;
        $c->save();
        
        $photos = array(
            new Photo(array('file_name' => '1.gif', 'order' => 0)),
            new Photo(array('file_name' => '2.gif', 'order' => 1)),
            new Photo(array('file_name' => '3.gif', 'order' => 2))
        );
        $c->photos()->saveMany($photos);
    }
}