<?php

namespace Marketing;

use App, View, ServiceCategory;

/**
 * Контроллер для страницы категорий
 */
class ServiceCategoriesController extends BaseController {
    
    public function getShow($id)
    {
        $data['service_category'] = ServiceCategory::find($id);
                
        if ($data['service_category']) {
            return View::make('marketing.service_categories.show', $data);
        } else {
            App::abort(404);
        }
    }
}
