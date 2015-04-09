<?php

namespace Marketing;

use App, View, News;

/**
 * Контроллер для новостной страницы
 */
class NewsController extends BaseController {
    
    public function getIndex()
    {
        // Список новостей с пагинацией
        $data['news'] = News::where('enabled', '=', '1')
                ->orderBy('created_at', 'DESC')
                ->paginate(6);
        
        return View::make('marketing.news.index', $data);
    }
    
    public function getShow($id)
    {
        // Новость
        $data['news'] = News::where('enabled', '=', '1')->find($id);
        
        if ($data['news']) {
            return View::make('marketing.news.show', $data);
        } else {
            App::abort(404);
        }
    }
}
