<?php

class Press extends Eloquent {

    protected $table = 'press';
    
    protected $fillable = array('title', 'full_text');
}