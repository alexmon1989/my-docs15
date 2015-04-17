<?php

namespace Marketing;

use View, Input, Validator, Redirect, Mail;

/**
 * Контроллер для страницы "отправить жалобу"
 */
class ComplaintController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = [
        'username' => '',
        'email' => 'email',
        'full_text' => 'required',
        'captcha' => 'required|captcha'
    ];
    
    // Русские имена полей
    private $niceNames = [
        'username' => 'ФИО',
        'email' => 'E-Mail',
        'full_text' => 'Текст жалобы',
        'captcha' => 'Текст с картинки',
    ];
    
    /**
     * Действие для отображения страницы с формой обращения
     */
    public function getShow()
    {                
        // Отображаем вид
        return View::make('marketing.complaint.show');
    }
    
    /**
     * Обработчик отправки формы
     */
    public function postShow()
    {
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {            
            // Отправляем письмо
            Mail::send('marketing.complaint.email', Input::all(), function($message)
            {
                //$message->to('info@mfc15.ru')->subject('Жалоба с сайта моидокументы15.рф');
                $message->to('alex.mon1989@gmail.com')->subject('Жалоба с сайта моидокументы15.рф');
            });
            
            return Redirect::to('complaint')
                    ->with('success', 'Жалоба успешно отправлена.');
        } else {
            return Redirect::to('complaint')
                    ->withErrors($validator)
                    ->withInput();
        }
    }
}
