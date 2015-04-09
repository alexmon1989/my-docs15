<?php

namespace Admin;

use App, View, Validator, Input, Str, Redirect, Image, Link;

/**
 * Контроллер для админ-ия ссылок
 */
class LinksController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'url' => 'required|url',
        'image' => 'mimes:jpeg,png,gif'
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'url' => 'URL',
        'image' => 'Изображение'
    );

     /**
     * Действие для отображения страницы с таблицей ссылок
     */
    public function getIndex()
    {        
        $data['links'] = Link::all();
                
        // Отображаем вид
        return View::make('admin.links.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления ссылки
     */
    public function getCreate()
    {        
        // Отображаем вид
        return View::make('admin.links.create');
    }
    
    /**
     * Дейсвтие для редактирвоание ссылки
     * 
     * @param integer $id Идент-ор ссылки
     */
    public function getEdit($id)
    {        
        $data['link'] = Link::find($id);
        
        if ($data['link']) {     
            return View::make('admin.links.edit', $data);
        } else {
            App::abort(404, 'Ссылка не найден');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование ссылки
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $link = Link::find($id);
        if ($link) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $link->title = trim(Input::get('title'));
                $link->url = trim(Input::get('url'));
                
                // Файл-изображение
                if (Input::hasFile('image')) {
                    $image = Input::file('image');
                    $new_path = public_path('img/links/');
                    $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                    
                    // Если есть прошлый файл, то удаляем
                    if ($link->image) {
                        $old_path_full = $new_path.$link->image;
                        if (file_exists($old_path_full)) {
                            unlink($old_path_full);
                        }
                    }
                    
                    $image->move($new_path, $new_name);
                    
                    // Меняем его размер
                    $img = Image::make($new_path.$new_name);
                    if ($img->width() > 230) {
                        $img->resize(230, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }

                    $img->save();
                    
                    $link->image = $new_name;
                }
                
                // Сохраняем и возвращаем
                $link->save();
                return Redirect::to('admin/links/edit/'.$id)
                        ->with('success', 'Ссылка успешно сохранена.');
            } else {
                return Redirect::to('admin/links/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Ссылка не найдена');
        }   
    }
    
    /**
     * Обработчик запроса на добавление ссылки
     * 
     * @param integer $id
     */
    public function postCreate()
    {        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            
            $link = new Link;
            
            // Текстовые данные
            $link->title = trim(Input::get('title'));
            $link->url = trim(Input::get('url'));

            // Файл-изображение
            if (Input::hasFile('image')) {
                $image = Input::file('image');
                $new_path = public_path('img/links/');
                $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                $image->move($new_path, $new_name);
                
                // Меняем его размер
                $img = Image::make($new_path.$new_name);
                if ($img->width() > 230) {
                    $img->resize(230, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save();
                }                
                
                $link->image = $new_name;
            }

            // Сохраняем и возвращаем
            $link->save();
            return Redirect::to('admin/links/edit/'.$link->id)
                    ->with('success', 'Ссылка успешно сохранена.');
        } else {
            return Redirect::to('admin/links/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления ссылки
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $link = Link::find($id);
        if ($link) { 
            if ($link->image) {
                $path = public_path('img/links/');                    
                $path_full = $path.$link->image;
                if (file_exists($path_full)) {
                    unlink($path_full);
                }
            }
            $link->delete();
            return Redirect::to('admin/links/index/')
                    ->with('success', 'Ссылка успешно удалена.');
        }
    }
}
