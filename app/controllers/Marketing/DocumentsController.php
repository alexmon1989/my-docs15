<?php

namespace Marketing;

use View, DocumentCategory, Video;

/**
 * Контроллер для страницы "полезные ссылки"
 */
class DocumentsController extends BaseController {
    
    public function getShow()
    {
        // Данные
        $data['documents_categories'] = DocumentCategory::orderBy('created_at', 'DESC')
                                                        ->get();
        $data['videos'] = Video::orderBy('created_at', 'DESC')
                                                        ->get();
        
        // Отображаем вид
        return View::make('marketing.documents.show', $data);
    }
}
