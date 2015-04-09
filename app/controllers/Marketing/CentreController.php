<?php

namespace Marketing;

use View, Session, Centre;

/**
 * Контроллер для страницы "О центре"
 */
class CentreController extends BaseController {
    
    public function getShow()
    {
        // Данные центра
        $id = Session::get('centre_id'); // Пользователь заранее выбрал нужный ему центр? 
        $data['centre'] = Centre::find($id);
        
        if (!$id or !$data['centre']) {
            $data['centre'] = Centre::first();
        }
        
        // Отображаем вид
        return View::make('marketing.centre.show', $data);
    }
}
