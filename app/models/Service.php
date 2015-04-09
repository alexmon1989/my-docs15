<?php

class Service extends Eloquent {

    protected $table = 'services';

    public function serviceCategory()
    {
        return $this->belongsTo('ServiceCategory');
    }
}