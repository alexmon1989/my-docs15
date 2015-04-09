<?php

class DocumentCategory extends Eloquent {

    protected $table = 'documents_categories';
    
    /**
     * Связь многие-ко-многим с таблицей documents 
     */
    public function documents()
    {
        return $this->hasMany('Document', 'document_category_id');
    }
    
}