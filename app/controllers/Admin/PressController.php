<?php

namespace Admin;

use App, View, Validator, Input, Redirect, Press;

/**
 * Контроллер для админ-ия страницы "Пресса о нас"
 */
class PressController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'full_text' => 'required',
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'full_text' => 'Полный текст',
    );

     /**
     * Действие для отображения страницы со статьёй
     */
    public function getIndex()
    {        
        $data['press'] = Press::first();
                
        // Отображаем вид
        return View::make('admin.press.index', $data);
    }
        
    /**
     * Обработчик запроса на редактирование видео
     * 
     * @param integer $id
     */
    public function postIndex()
    {
        $press = Press::first();
        if ($press) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $press->title = trim(Input::get('title'));     
                $press->full_text = trim(Input::get('full_text'));
                                                
                // Сохраняем и возвращаем
                $press->save();
                return Redirect::to('admin/press/index/')
                        ->with('success', 'Страница успешно сохранена.');
            } else {
                return Redirect::to('admin/press/index/')
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Страница не найдена');
        }   
    }
}
