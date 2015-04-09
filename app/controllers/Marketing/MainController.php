<?php

namespace Marketing;

use View, News, Input, Session;

/**
 * Контроллер для главной страницы
 */
class MainController extends BaseController {
    
    public function showMain()
    {
        // Список последних новостей
        $data['news'] = News::where('enabled', '=', '1')
                ->take(6)
                ->orderBy('created_at', 'DESC')
                ->get();
        
        // Отображаем вид
        return View::make('marketing.main.page', $data);
    }
}
