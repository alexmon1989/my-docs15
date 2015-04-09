<?php

class MembersTableSeeder extends Seeder {
    public function run()
    {
        DB::table('members')->truncate();
        
        for ($i = 1; $i < 6; $i++) 
        {
            Member::create(array(
                    'title' => 'Участник '.$i,
                    'image' => $i.'.png',
                    'url' => 'http://ya.ru'
                )
            );
        }
    }
}