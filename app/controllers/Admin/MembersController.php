<?php

namespace Admin;

use App, View, Validator, Input, Str, Redirect, Image, Member;

/**
 * Контроллер для админ-ия участников МФЦ
 */
class MembersController extends BaseController {
    
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
     * Действие для отображения страницы с таблицей участников МФЦ
     */
    public function getIndex()
    {        
        $data['members'] = Member::all();
                
        // Отображаем вид
        return View::make('admin.members.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления участника МФЦ
     */
    public function getCreate()
    {        
        // Отображаем вид
        return View::make('admin.members.create');
    }
    
    /**
     * Дейсвтие для редактирвоание участника МФЦ
     * 
     * @param integer $id Идент-ор участника МФЦ
     */
    public function getEdit($id)
    {        
        $data['member'] = Member::find($id);
        
        if ($data['member']) {     
            return View::make('admin.members.edit', $data);
        } else {
            App::abort(404, 'Участник МФЦ не найден');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование участника МФЦ
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $member = Member::find($id);
        if ($member) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $member->title = trim(Input::get('title'));
                $member->url = trim(Input::get('url'));
                
                // Файл-изображение
                if (Input::hasFile('image')) {
                    $image = Input::file('image');
                    $new_path = public_path('img/members/');
                    $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                    
                    // Если есть прошлый файл, то удаляем
                    if ($member->image) {
                        $old_path_full = $new_path.$member->image;
                        if (file_exists($old_path_full)) {
                            unlink($old_path_full);
                        }
                    }
                    
                    $image->move($new_path, $new_name);
                    
                    // Меняем его размер
                    $img = Image::make($new_path.$new_name);
                    if ($img->width() > 100) {
                        $img->resize(100, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }

                    $img->save();
                    
                    $member->image = $new_name;
                }
                
                // Сохраняем и возвращаем
                $member->save();
                return Redirect::to('admin/members/edit/'.$id)
                        ->with('success', 'Участник МФЦ успешно сохранен.');
            } else {
                return Redirect::to('admin/members/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Участник МФЦ не найден');
        }   
    }
    
    /**
     * Обработчик запроса на добавление участника МФЦ
     * 
     * @param integer $id
     */
    public function postCreate()
    {        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            
            $member = new Member;
            
            // Текстовые данные
            $member->title = trim(Input::get('title'));
            $member->url = trim(Input::get('url'));

            // Файл-изображение
            if (Input::hasFile('image')) {
                $image = Input::file('image');
                $new_path = public_path('img/members/');
                $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                $image->move($new_path, $new_name);
                
                // Меняем его размер
                $img = Image::make($new_path.$new_name);
                if ($img->width() > 100) {
                    $img->resize(100, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save();
                }                
                
                $member->image = $new_name;
            }

            // Сохраняем и возвращаем
            $member->save();
            return Redirect::to('admin/members/edit/'.$member->id)
                    ->with('success', 'Участник МФЦ успешно сохранен.');
        } else {
            return Redirect::to('admin/members/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления участника МФЦ
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $member = Member::find($id);
        if ($member) { 
            if ($member->image) {
                $path = public_path('img/members/');                    
                $path_full = $path.$member->image;
                if (file_exists($path_full)) {
                    unlink($path_full);
                }
            }
            $member->delete();
            return Redirect::to('admin/members/index/')
                    ->with('success', 'Участник МФЦ успешно удален.');
        }
    }
}
