<?php

class Organization extends Eloquent {

    protected $table = 'organizations';
    
    public function serviceCategories()
    {
        return $this->hasMany('ServiceCategory', 'organization_id');
    }
}