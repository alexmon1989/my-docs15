<?php

namespace Admin;

use App, View, Validator, Input, Redirect, Hash, Video, User;

/**
 * Контроллер для админ-ия пользователей (админов)
 */
class UsersController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'username' => 'required',
        'email' => 'required|email',
        'password' => ''
    );
    
    // Русские имена полей
    private $niceNames = array(
        'username' => 'Логин',
        'email' => 'E-Mail',
        'password' => 'Пароль'
    );

     /**
     * Действие для отображения страницы с таблицей админов
     */
    public function getIndex()
    {        
        $data['users'] = User::all();
                
        // Отображаем вид
        return View::make('admin.users.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления админа
     */
    public function getCreate()
    {                
        // Отображаем вид
        return View::make('admin.users.create');
    }
    
    /**
     * Дейсвтие для редактирвоание админа
     * 
     * @param integer $id Идент-ор админа
     */
    public function getEdit($id)
    {                
        $data['user'] = User::find($id);
        
        if ($data['user']) {             
            return View::make('admin.users.edit', $data);
        } else {
            App::abort(404, 'Администратор не найден');
        }
    }
    
    /**
     * Обработчик запроса на редактирование видео
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $user = User::find($id);
        if ($user) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                
                // Текстовые данные
                $user->username = trim(Input::get('username'));  
                $user->email = trim(Input::get('email'));  
                $password = trim(Input::get('password'));
                if ($password != '') {
                    $user->password = Hash::make($password); 
                }
                                                
                // Сохраняем и возвращаем
                $user->save();
                return Redirect::to('admin/users/edit/'.$id)
                        ->with('success', 'Администратор успешно сохранен.');
            } else {
                return Redirect::to('admin/users/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Администратор не найден');
        }   
    }
    
    /**
     * Обработчик запроса на добавление админа
     */
    public function postCreate()
    {        
        // Валидация полей
        $this->rules['password'] = 'required|min:5';
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            
            $user = new User;
            
            // Текстовые данные
            $user->username = trim(Input::get('username'));  
            $user->email = trim(Input::get('email'));        
            $user->password = Hash::make(trim(Input::get('password')));            
            
            // Сохраняем и возвращаем
            $user->save();
            return Redirect::to('admin/users/edit/'.$user->id)
                    ->with('success', 'Администратор успешно сохранен.');
        } else {
            return Redirect::to('admin/users/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления админа
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $user = User::find($id);
        if ($user) {      
            if (User::count() > 1) {
                $user->delete();
                return Redirect::to('admin/users/index/')
                        ->with('success', 'Администратор успешно удален.');
            } else {
                App::abort(404, 'Невозможно удалить последнего администратора!');
            }
        } else {
            App::abort(404, 'Администратор не найден');
        }
    }
}
