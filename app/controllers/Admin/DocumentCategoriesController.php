<?php

namespace Admin;

use App, View, Validator, Input, Redirect, DocumentCategory;

/**
 * Контроллер для админ-ия категорий документов
 */
class DocumentCategoriesController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required'
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название'
    );

     /**
     * Действие для отображения страницы с таблицей категорий документов
     */
    public function getIndex()
    {        
        $data['categories'] = DocumentCategory::all();
                
        // Отображаем вид
        return View::make('admin.document_categories.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления категорий документов
     */
    public function getCreate()
    {        
        // Отображаем вид
        return View::make('admin.document_categories.create');
    }
    
    /**
     * Дейсвтие для редактирвоание категории документов
     * 
     * @param integer $id Идент-ор категории документов
     */
    public function getEdit($id)
    {        
        $data['category'] = DocumentCategory::find($id);
        
        if ($data['category']) {     
            return View::make('admin.document_categories.edit', $data);
        } else {
            App::abort(404, 'Категория документов не найдена');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование категории документов
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $category = DocumentCategory::find($id);
        if ($category) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $category->title = trim(Input::get('title'));     
                
                // Сохраняем и возвращаем
                $category->save();
                return Redirect::to('admin/document-categories/edit/'.$id)
                        ->with('success', 'Категория документов успешно сохранена.');
            } else {
                return Redirect::to('admin/document-categories/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Категория документов не найдена');
        }   
    }
    
    /**
     * Обработчик запроса на добавление категории документов
     */
    public function postCreate()
    {        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            
            $category = new DocumentCategory;
            
            // Текстовые данные
            $category->title = trim(Input::get('title'));

            // Сохраняем и возвращаем
            $category->save();
            return Redirect::to('admin/document-categories/edit/'.$category->id)
                    ->with('success', 'Категория документов успешно сохранена.');
        } else {
            return Redirect::to('admin/document-categories/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления категории документов
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $category = DocumentCategory::find($id);
        if ($category) {             
            $category->delete();
            return Redirect::to('admin/document-categories/index/')
                    ->with('success', 'Категория документов успешно удалена.');
        } else {
            App::abort(404, 'Категория документов не найдена');
        }
    }
}
