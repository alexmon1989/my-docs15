<?php

namespace Marketing;

use App, View, Session, Organization;

/**
 * Контроллер для страницы отображения услуг по ведомствам
 */
class OrganizationsController extends BaseController {
    
    public function getShow($id)
    {
        $data['organization'] = Organization::find($id);
        
        if ($data['organization']) {  
            // Ставим в сессию сортировку по категориям услуг
            Session::set('sort', 'organizations');
            
            return View::make('marketing.organizations.show', $data);
        } else {
            App::abort(404);
        }
    }
}
