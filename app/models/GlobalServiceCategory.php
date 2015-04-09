<?php

class GlobalServiceCategory extends Eloquent {

    protected $table = 'global_service_categories';

    public function serviceCategories()
    {
        return $this->hasMany('ServiceCategory', 'global_service_category_id');
    }
}