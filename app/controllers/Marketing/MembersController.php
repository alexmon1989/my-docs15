<?php

namespace Marketing;

use View, Member;

/**
 * Контроллер для страницы "Участники МФЦ"
 */
class MembersController extends BaseController {
    
    public function getShow()
    {
        // Данные
        $data['members'] = Member::orderBy('id', 'ASC')->get();
        
        // Отображаем вид
        return View::make('marketing.members.show', $data);
    }
}
