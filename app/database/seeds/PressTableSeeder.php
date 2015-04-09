<?php

class PressTableSeeder extends Seeder {
    public function run()
    {
        DB::table('press')->delete();
        
        Press::create(array(
                'title' => 'Пресса о нас',
                'full_text' => ''
            )
        );
    }
}