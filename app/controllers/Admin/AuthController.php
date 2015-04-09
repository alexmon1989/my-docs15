<?php

namespace Admin;

use View, Input, Auth, Redirect, Controller;

/**
 * Контроллер авторизации пользователей
 */
class AuthController extends Controller {
    
    /**
     * Форма логина
     */
    public function getLogin()
    {        
        return View::make('admin/auth/login');
    }
    
    /**
     * Обработчик post-запроса авторизации
     */
    public function postLogin()
    {   
        // Формируем базовый набор данных для авторизации
        $creds = array(
            'password' => Input::get('password')
        );

        // В зависимости от того, что пользователь указал в поле username,
        // дополняем авторизационные данные
        $login = Input::get('login');
        if (strpos($login, '@')) {
            $creds['email'] = $login;
        } else {
            $creds['username'] = $login;
        }
        
        // Пытаемся авторизовать пользователя
        if (Auth::attempt($creds, Input::has('remember'))) 
        {
            $page = 'dashboard';
            if (Input::get('redirect')) {
                $page = Input::get('redirect');
            }
            return Redirect::to('admin/'.$page);
        } 
        else
        {
            return Redirect::to('admin/auth/login')
                    ->with('message', 'Данная комбинация логина и пароля не является верной.');
        }
    }
    
    /**
     * Логаут
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('admin/auth/login');
    }
}
