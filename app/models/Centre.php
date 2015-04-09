<?php

class Centre extends Eloquent {

    protected $table = 'centres';
    
    /**
     * Связь многие-ко-многим с таблицей photos 
     */
    public function photos()
    {
        return $this->belongsToMany('Photo', 'centres_photos', 'centre_id', 'photo_id')->orderBy('order');
    }
    
    /**
     * Связь один-ко-многим с таблицей centres_files 
     */
    public function files()
    {
        return $this->hasMany('CentreFile', 'centre_id');
    }
    
}