<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();
        
        User::create(array(
                'email' => 'alex.mon1989@gmail.com',
                'password' => Hash::make('admin1234'),
                'username' => 'admin'
            )
        );        
    }
}