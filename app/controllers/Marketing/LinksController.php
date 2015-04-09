<?php

namespace Marketing;

use View, Link;

/**
 * Контроллер для страницы "полезные ссылки"
 */
class LinksController extends BaseController {
    
    public function getShow()
    {
        // Данные
        $data['links'] = Link::orderBy('id', 'ASC')->get();
        
        // Отображаем вид
        return View::make('marketing.links.show', $data);
    }
}
