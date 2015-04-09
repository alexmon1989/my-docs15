<?php

namespace Marketing;

use App, View, Session, GlobalServiceCategory;

/**
 * Контроллер для страницы глобальных категорий
 */
class GlobalServiceCategoriesController extends BaseController {
    
    public function getShow($id)
    {
        $data['global_category'] = GlobalServiceCategory::find($id);
        
        if ($data['global_category']) {  
            // Ставим в сессию сортировку по категориям услуг
            Session::set('sort', 'categories');
            
            return View::make('marketing.global_categories.show', $data);
        } else {
            App::abort(404);
        }
    }
}
