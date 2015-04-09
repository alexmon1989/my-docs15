<?php

class DocumentsCategoriesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('documents_categories')->delete();
        
        $cat1 = new DocumentCategory;
        $cat1->title = 'Дополнительное соглашение 6-М (Долгоруково)';
        $cat1->save();
        
        $cat2 = new DocumentCategory;
        $cat2->title = 'Реестры';
        $cat2->save();
        
        $doc1 = new Document;
        $doc1->title = 'Доп. соглашение 6-М (Долгоруково)';
        $doc1->document_category_id = $cat1->id;
        $doc1->file = 'file1.pdf';
        $doc1->size = 631.96;
        $doc1->save();
        
        $doc2 = new Document;
        $doc2->title = 'Доп. соглашение к 5-М (Долгоруково)';
        $doc2->document_category_id = $cat1->id;
        $doc2->file = 'file2.pdf';
        $doc2->size = 606.59;
        $doc2->save();
        
        $doc3 = new Document;
        $doc3->title = 'Доп. соглашение к 7-М (Долгоруково)';
        $doc3->document_category_id = $cat1->id;
        $doc3->file = 'file3.pdf';
        $doc3->size = 634.1;
        $doc3->save();
        
        $doc4 = new Document;
        $doc4->title = 'Реестр соглашений';
        $doc4->document_category_id = $cat2->id;
        $doc4->file = 'file4.pdf';
        $doc4->size = 27.44;
        $doc4->save();
        
        $doc5 = new Document;
        $doc5->title = 'Реестр филиалов и обособ. подр-й УМФЦ';
        $doc5->document_category_id = $cat2->id;
        $doc5->file = 'file4.pdf';
        $doc5->size = 69;  
        $doc5->save();      
    }
}