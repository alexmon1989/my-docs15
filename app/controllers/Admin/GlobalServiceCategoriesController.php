<?php

namespace Admin;

use App, View, Validator, Input, Redirect, GlobalServiceCategory;

/**
 * Контроллер для админ-ия глобальных категорий услуг
 */
class GlobalServiceCategoriesController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
    );
    
    /**
     * Действие для отображения страницы с таблицой услуг
     */
    public function getIndex()
    {        
        $data['global_services'] = GlobalServiceCategory::orderBy('title')
                                                        ->get();
                
        // Отображаем вид
        return View::make('admin.global_service_categories.index', $data);
    }
    
    /**
     * Действие для отображения страницы создания услуги
     */
    public function getCreate()
    {
        // Отображаем вид
        return View::make('admin.global_service_categories.create');
    }
    
    /**
     * Обработчик запроса на создание услуги
     */
    public function postCreate()
    {
        $global_service = new GlobalServiceCategory;
        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            // Текстовые данные
            $global_service->title = trim(Input::get('title'));
            
            // Сохраняем и возвращаем
            $global_service->save();
            return Redirect::to('admin/global-categories/edit/'.$global_service->id)
                    ->with('success', 'Услуга успешно сохранена.');
        } else {
            return Redirect::to('admin/global-categories/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для отображения страницы реадктирования услуги
     */
    public function getEdit($id)
    {
        $data['global_service'] = GlobalServiceCategory::find($id);
        
        if ($data['global_service']) {     
            // Отображаем вид
            return View::make('admin.global_service_categories.edit', $data);
        } else {
            App::abort(404, 'Услуга не найдена');
        }        
    }
    
    /**
     * Обработчик запроса на изменение данных услуги
     */
    public function postEdit($id)
    {
        $global_service = GlobalServiceCategory::find($id);
        if ($global_service) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames( $this->niceNames );               
            if ( !$validator->fails() ) {
                // Текстовые данные
                $global_service->title = trim(Input::get('title'));
                
                // Сохраняем и возвращаем
                $global_service->save();
                return Redirect::to('admin/global-categories/edit/'.$id)
                        ->with('success', 'Новость успешно сохранена.');
            } else {
                return Redirect::to('admin/global-categories/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Услуга не найдена');
        }   
    }


    /**
     * Действие для удаления услуги
     */
    public function getDelete($id)
    {
        $global_service = GlobalServiceCategory::find($id);
        if ($global_service) { 
            $global_service->delete();
            return Redirect::to('admin/global-categories/index/')
                    ->with('success', 'Услуга успешно удалена.');
        }
    }
}