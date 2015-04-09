<?php

class Document extends Eloquent {

    protected $table = 'documents';
    
    /**
     * Связь один-ко-многим с таблицей documents_categories
     */
    public function documentCategory()
    {
        return $this->belongsTo('DocumentCategory');
    }
    
}