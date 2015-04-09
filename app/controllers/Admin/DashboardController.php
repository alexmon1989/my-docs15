<?php

namespace Admin;

use View;

/**
 * Контроллер для страницы стартовой страницы админ-панели
 */
class DashboardController extends BaseController {
    
    public function getShow()
    {        
        // Отображаем вид
        return View::make('admin.dashboard.show');
    }
}
