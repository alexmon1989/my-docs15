<?php

class Photo extends Eloquent {

    protected $table = 'photos';
    
    /**
     * Связь многие-ко-многим с таблицей centres 
     */
    public function centre()
    {
        return $this->belongsToMany('Centre', 'centres_photos', 'photo_id', 'centre_id');
    }
}