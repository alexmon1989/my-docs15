<?php

class VideosTableSeeder extends Seeder {
    public function run()
    {
        DB::table('videos')->truncate();
        
        Video::create(array(
                'title' => 'Мы работаем в МФЦ',
                'youtube_id' => 'Ul5NAqmASvQ'
            )
        );
        
        Video::create(array(
                'title' => 'Мульти МФЦ',
                'youtube_id' => 'UaXFM6_CrjA'
            )
        );
        
        Video::create(array(
                'title' => 'Независимая экспертиза МФЦ',
                'youtube_id' => 'T58lTyhog-Q'
            )
        );
    }
}