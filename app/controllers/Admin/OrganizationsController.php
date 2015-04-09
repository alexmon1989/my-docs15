<?php

namespace Admin;

use App, View, Validator, Input, Redirect, Organization;

/**
 * Контроллер для админ-ия организаций, предоставляющих услуги
 */
class OrganizationsController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required'
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название'
    );
    
    /**
     * Действие для отображения страницы с таблицой организаций
     */
    public function getIndex()
    {        
        $data['organizations'] = Organization::all();
                
        // Отображаем вид
        return View::make('admin.organizations.index', $data);
    }
    
    /**
     * Действие для отображения страницы создания организаций
     */
    public function getCreate()
    {
       // Отображаем вид
        return View::make('admin.organizations.create');
    }
    
    /**
     * Обработчик запроса на создание организации
     */
    public function postCreate()
    {
        $organization = new Organization;
        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            // Текстовые данные
            $organization->title = trim(Input::get('title'));
            
            // Сохраняем и возвращаем
            $organization->save();
            return Redirect::to('admin/organizations/edit/'.$organization->id)
                    ->with('success', 'Ведомство успешно сохранено.');
        } else {
            return Redirect::to('admin/organizations/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для отображения страницы реадктирования организации
     */
    public function getEdit($id)
    {
        $data['organization'] = Organization::find($id);
        
        if ($data['organization']) {     
            // Отображаем вид
            return View::make('admin.organizations.edit', $data);
        } else {
            App::abort(404, 'Ведомство не найдено');
        }    
    }
    
    /**
     * Обработчик запроса на изменение данных организации
     */
    public function postEdit($id)
    {
        $organization = Organization::find($id);
        if ($organization) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames( $this->niceNames );               
            if ( !$validator->fails() ) {
                // Текстовые данные
                $organization->title = trim(Input::get('title'));
                                                
                // Сохраняем и возвращаем
                $organization->save();
                return Redirect::to('admin/organizations/edit/'.$id)
                        ->with('success', 'Ведомство успешно сохранено.');
            } else {
                return Redirect::to('admin/organizations/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Ведомство не найдено');
        }   
    }

    /**
     * Действие для удаления организации
     */
    public function getDelete($id)
    {
        $organization = Organization::find($id);
        if ($organization) {      
            $organization->delete();
            return Redirect::to('admin/organizations/index/'.$id)
                    ->with('success', 'Ведомство успешно удалено.');
        } else {
            App::abort(404, 'Организация не найдена');
        }   
    }
}