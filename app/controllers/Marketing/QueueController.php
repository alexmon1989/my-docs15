<?php

namespace Marketing;

use View;

/**
 * Контроллер для страницы отображения услуг по ведомствам
 */
class QueueController extends BaseController {
    
    public function getShow()
    {
        return View::make('marketing.queue.show');        
    }
}
