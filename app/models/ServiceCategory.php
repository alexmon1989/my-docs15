<?php

class ServiceCategory extends Eloquent {

    protected $table = 'service_categories';
    
    public function globalServiceCategory()
    {
        return $this->belongsTo('GlobalServiceCategory');
    }
    
    public function organization()
    {
        return $this->belongsTo('Organization');
    }
    
    public function services()
    {
        return $this->hasMany('Service', 'service_category_id');
    }
}