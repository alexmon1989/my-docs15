<?php

namespace Admin;

use App, View, Validator, Input, Redirect, ServiceCategory, Service;

/**
 * Контроллер для админ-ия услуг (статей)
 */
class ServicesController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title'     => 'required',
        'full_text' => 'required',
        'note' => ''
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title'     => 'Название',
        'full_text' => 'Текст статьи',
        'note' => 'Примечание'
    );
    
    /**
     * Действие для отображения страницы с таблицой статей подкатегории услуги
     */
    public function getIndex($service_category_id)
    {        
        $data['service_category'] = ServiceCategory::find( $service_category_id );
                
        // Отображаем вид
        return View::make('admin.services.index', $data);
    }
    
    /**
     * Действие для отображения страницы создания подкатегории услуги
     */
    public function getCreate($service_category_id)
    {
        $data['service_category'] = ServiceCategory::find( $service_category_id );
        
        // Отображаем вид
        return View::make('admin.services.create', $data);
    }
    
    /**
     * Обработчик запроса на создание категории услуги
     */
    public function postCreate($id)
    {
        $service = new Service;
        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            // Текстовые данные
            $service->title = trim(Input::get('title'));
            $service->full_text = trim(Input::get('full_text'));
            $service->note = trim(Input::get('note'));
            
            // id категории
            $service->service_category_id = $id;
            
            // Сохраняем и возвращаем
            $service->save();
            return Redirect::to('admin/services/edit/'.$service->id)
                    ->with('success', 'Статья категории услуги успешно сохранена.');
        } else {
            return Redirect::to('admin/services/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для отображения страницы реадктирования статьи подкатегории услуги
     */
    public function getEdit($id)
    {
        $data['service'] = Service::find($id);
        
        if ($data['service']) {     
            // Отображаем вид
            return View::make('admin.services.edit', $data);
        } else {
            App::abort(404, 'Статья категории услуги не найдена');
        }    
    }
    
    /**
     * Обработчик запроса на изменение данных статьи подкатегории услуги
     */
    public function postEdit($id)
    {
        $service = Service::find($id);
        if ($service) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames( $this->niceNames );               
            if ( !$validator->fails() ) {
                // Текстовые данные
                $service->title = trim(Input::get('title'));
                $service->full_text = trim(Input::get('full_text'));
                $service->note = trim(Input::get('note'));
                                
                // Сохраняем и возвращаем
                $service->save();
                return Redirect::to('admin/services/edit/'.$id)
                        ->with('success', 'Статья категории услуги успешно сохранена.');
            } else {
                return Redirect::to('admin/services/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Статья категории услуги не найдена');
        }   
    }

    /**
     * Действие для удаления статьи подкатегории услуги
     */
    public function getDelete($id)
    {
        $service = Service::find($id);
        if ($service) { 
            $id = $service->serviceCategory->id;
            $service->delete();
            return Redirect::to('admin/services/index/'.$id)
                    ->with('success', 'Статья категория услуги успешно удалена.');
        } else {
            App::abort(404, 'Статья категории услуги не найдена');
        } 
    }
}