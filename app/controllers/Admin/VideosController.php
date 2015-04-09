<?php

namespace Admin;

use App, View, Validator, Input, Redirect, Video;

/**
 * Контроллер для админ-ия видео
 */
class VideosController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'youtube_id' => 'required',
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'youtube_id' => 'ID видео на Youtube',
    );

     /**
     * Действие для отображения страницы с таблицей видео
     */
    public function getIndex()
    {        
        $data['videos'] = Video::all();
                
        // Отображаем вид
        return View::make('admin.videos.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления видео
     */
    public function getCreate()
    {                
        // Отображаем вид
        return View::make('admin.videos.create');
    }
    
    /**
     * Дейсвтие для редактирвоание видео
     * 
     * @param integer $id Идент-ор видео
     */
    public function getEdit($id)
    {                
        $data['video'] = Video::find($id);
        
        if ($data['video']) {             
            return View::make('admin.videos.edit', $data);
        } else {
            App::abort(404, 'Видео не найдено');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование видео
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $video = Video::find($id);
        if ($video) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $video->title = trim(Input::get('title'));     
                $video->youtube_id = Input::get('youtube_id');
                                                
                // Сохраняем и возвращаем
                $video->save();
                return Redirect::to('admin/videos/edit/'.$id)
                        ->with('success', 'Видео успешно сохранено.');
            } else {
                return Redirect::to('admin/videos/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Видео не найдено');
        }   
    }
    
    /**
     * Обработчик запроса на добавление видео
     */
    public function postCreate()
    {        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            
            $video = new Video;
            
            // Текстовые данные
            $video->title = trim(Input::get('title'));
            $video->youtube_id = Input::get('youtube_id');               
            
            // Сохраняем и возвращаем
            $video->save();
            return Redirect::to('admin/videos/edit/'.$video->id)
                    ->with('success', 'Видео успешно сохранено.');
        } else {
            return Redirect::to('admin/videos/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления видео
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $video = Video::find($id);
        if ($video) {      
            $video->delete();
            return Redirect::to('admin/videos/index/')
                    ->with('success', 'Видео успешно удалено.');
        } else {
            App::abort(404, 'Видео не найдено');
        }
    }
}
