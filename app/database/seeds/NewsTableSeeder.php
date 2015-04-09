<?php

class NewsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('news')->truncate();
        
        for ($i = 1; $i <= 7; $i++)
        {
            News::create(array(
                    'title' => 'Новость '.$i,
                    'short_text' => 'Короткий текст Новости '.$i,
                    'full_text' => 'Полный текст Новости '.$i,
                    'image' => "news_{$i}.jpg",
                    'enabled' => TRUE,
                )
            );
        }
    }
}