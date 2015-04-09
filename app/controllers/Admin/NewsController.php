<?php

namespace Admin;

use App, View, Validator, Input, Str, Redirect, News;

/**
 * Контроллер для админ-ия новостей
 */
class NewsController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'enabled' => 'required|integer',
        'image' => 'mimes:jpeg,png,gif'
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'enabled' => 'Включено',
        'image' => 'Изображение'
    );

     /**
     * Действие для отображения страницы с таблицой новостей
     */
    public function getIndex()
    {        
        $data['news'] = News::all();
                
        // Отображаем вид
        return View::make('admin.news.index', $data);
    }
    
    public function getCreate()
    {        
        // Отображаем вид
        return View::make('admin.news.create');
    }
    
    /**
     * Дейсвтие для редактирвоание новости
     * 
     * @param integer $id Идент-ор новости
     */
    public function getEdit($id)
    {        
        $data['news'] = News::find($id);
        
        if ($data['news']) {     
            return View::make('admin.news.edit', $data);
        } else {
            App::abort(404, 'Новость не найдена');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование новости
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $news = News::find($id);
        if ($news) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $news->title = trim(Input::get('title'));
                $news->short_text = trim(Input::get('short_text'));
                $news->full_text = trim(Input::get('full_text'));
                $news->enabled = trim(Input::get('enabled'));
                
                // Файл-изображение
                if (Input::hasFile('image')) {
                    $image = Input::file('image');
                    $new_path = public_path('img/articles/');
                    $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                    
                    // Если есть прошлый файл, то удаляем
                    if ($news->image) {
                        $old_path_full = $new_path.$news->image;
                        if (file_exists($old_path_full)) {
                            unlink($old_path_full);
                        }
                    }
                    
                    $image->move($new_path, $new_name);
                    $news->image = $new_name;
                }
                
                // Сохраняем и возвращаем
                $news->save();
                return Redirect::to('admin/news/edit/'.$id)
                        ->with('success', 'Новость успешно сохранена.');
            } else {
                return Redirect::to('admin/news/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Новость не найдена');
        }   
    }
    
    /**
     * Обработчик запроса на добавление новости
     * 
     * @param integer $id
     */
    public function postCreate()
    {
        $news = new News;
        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            // Текстовые данные
            $news->title = trim(Input::get('title'));
            $news->short_text = trim(Input::get('short_text'));
            $news->full_text = trim(Input::get('full_text'));
            $news->enabled = trim(Input::get('enabled'));

            // Файл-изображение
            if (Input::hasFile('image')) {
                $image = Input::file('image');
                $new_path = public_path('img/articles/');
                $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                $image->move($new_path, $new_name);
                $news->image = $new_name;
            }

            // Сохраняем и возвращаем
            $news->save();
            return Redirect::to('admin/news/edit/'.$news->id)
                    ->with('success', 'Новость успешно сохранена.');
        } else {
            return Redirect::to('admin/news/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления новости
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $news = News::find($id);
        if ($news) { 
            if ($news->image) {
                $path = public_path('img/articles/');                    
                $path_full = $path.$news->image;
                if (file_exists($path_full)) {
                    unlink($path_full);
                }
            }
            $news->delete();
            return Redirect::to('admin/news/index/')
                    ->with('success', 'Новость успешно удалена.');
        }
    }
}
