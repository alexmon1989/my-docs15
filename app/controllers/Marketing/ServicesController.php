<?php

namespace Marketing;

use App, View, Service;

/**
 * Контроллер для страницы услуг
 */
class ServicesController extends BaseController {
    
    public function getShow($id)
    {
        $data['service'] = Service::find($id);
                
        if ($data['service']) {
            return View::make('marketing.service.show', $data);
        } else {
            App::abort(404);
        }
    }
}
