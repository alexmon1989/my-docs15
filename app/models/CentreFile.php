<?php

class CentreFile extends Eloquent {

    protected $table = 'centres_files';
    
    /**
     * Связь многие-к-одному с таблицей centres 
     */
    public function centre()
    {
        return $this->belongsTo('Centre');
    }    
    
}