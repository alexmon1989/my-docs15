<?php

namespace Marketing;

use View, Press;

/**
 * Контроллер для страницы "пресса о нас"
 */
class PressController extends BaseController {
    
    public function getShow()
    {        
        // Берём первый элемент в таблице - это нужная статья
        $data['press'] = Press::first();
        
        // Отображаем вид
        return View::make('marketing.press.show', $data);
    }
}
