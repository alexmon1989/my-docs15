<?php

namespace Admin;

use App, View, Validator, Input, Str, Redirect, Image, Member, Carousel;

/**
 * Контроллер для админ-ия слайдера
 */
class CarouselController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'description' => '',
        'filename' => 'mimes:jpeg,png,gif',
        'enabled' => 'integer|between:0,1'
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'description' => 'Описание',
        'enabled' => 'Включено',
        'filename' => 'Изображение'
    );

     /**
     * Действие для отображения страницы с таблицей слайдов
     */
    public function getIndex()
    {        
        $data['slides'] = Carousel::all();
        $data['max_order'] = Carousel::max('order');
        $data['min_order'] = Carousel::min('order');
                
        // Отображаем вид
        return View::make('admin.carousel.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления слайда
     */
    public function getCreate()
    {        
        // Отображаем вид
        return View::make('admin.carousel.create');
    }
    
    /**
     * Дейсвтие для редактирвоание слайда
     * 
     * @param integer $id Идент-ор слайда
     */
    public function getEdit($id)
    {        
        $data['slide'] = Carousel::find($id);
        
        if ($data['slide']) {     
            return View::make('admin.carousel.edit', $data);
        } else {
            App::abort(404, 'Слайд не найден');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование слайда
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $carousel = Carousel::find($id);
        if ($carousel) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $carousel->title = trim(Input::get('title'));
                $carousel->description = trim(Input::get('description'));
                $carousel->enabled = Input::get('enabled');
                
                // Файл-изображение
                if (Input::hasFile('filename')) {
                    $image = Input::file('filename');
                    $new_path = public_path('img/slider/');
                    $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                    
                    // Если есть прошлый файл, то удаляем
                    if ($carousel->filename) {
                        $old_path_full = $new_path.$carousel->filename;
                        if (file_exists($old_path_full)) {
                            unlink($old_path_full);
                        }
                    }
                    
                    $image->move($new_path, $new_name);
                    
                    // Меняем его размер
                    $img = Image::make($new_path.$new_name);
                    $img->resize(855, 400);
                    $img->save();
                    
                    $carousel->filename = $new_name;
                }
                
                // Сохраняем и возвращаем
                $carousel->save();
                return Redirect::to('admin/carousel/edit/'.$id)
                        ->with('success', 'Слайд успешно сохранен.');
            } else {
                return Redirect::to('admin/carousel/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Слайд не найден');
        }   
    }
    
    /**
     * Обработчик запроса на добавление слайда
     * 
     * @param integer $id
     */
    public function postCreate()
    {        
        // Валидация полей
        $this->rules['filename'] .= '|required'; 
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {            
            $carousel = new Carousel;
            
            // Текстовые данные
            $carousel->title = trim(Input::get('title'));
            $carousel->description = trim(Input::get('description'));
            $carousel->enabled = Input::get('enabled');
            $carousel->order = Carousel::max('order') + 1;

            // Файл-изображение
            if (Input::hasFile('filename')) {
                $image = Input::file('filename');
                $new_path = public_path('img/slider/');
                //var_dump($new_path); die();
                $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                $image->move($new_path, $new_name);
                
                // Меняем его размер
                $img = Image::make($new_path.$new_name);
                $img->resize(855, 400);
                $img->save();
                
                $carousel->filename = $new_name;
            }

            // Сохраняем и возвращаем
            $carousel->save();
            return Redirect::to('admin/carousel/edit/'.$carousel->id)
                    ->with('success', 'Слайд успешно сохранена.');
        } else {
            return Redirect::to('admin/carousel/create/')
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
        $carousel = Carousel::find($id);
        if ($carousel) { 
            if ($carousel->filename) {
                $path = public_path('img/slider/');                    
                $path_full = $path.$carousel->filename;
                if (file_exists($path_full)) {
                    unlink($path_full);
                }
            }
            $order = $carousel->order;
            $carousel->delete();
            
            // Меняем порядок всем слайдам, которые идут за этим
            $slides = Carousel::where('order', '>', $order)
                    ->get();
            foreach ($slides as $slide) {
                $slide->order = $slide->order - 1;
                $slide->save();
            }
            
            return Redirect::to('admin/carousel/index/')
                    ->with('success', 'Слайд успешно удален.');
        }
    }
    
    /**
     * Уменьшает порядок слайда
     * 
     * @param integer $id
     */
    public function getIncreaseOrder($id)
    {
        $carousel = Carousel::find($id);
        if ($carousel) { 
            // Меняем порядок следующего слайда
            $slide_next = Carousel::where('order', '=', ($carousel->order + 1))
                    ->first();
            if ($slide_next) {
                $slide_next->order = $slide_next->order - 1;
                $slide_next->save();
            } else {
                return Redirect::to('admin/carousel/index/')
                    ->with('error', 'Невозможно увеличить порядок. Слайд и так уже последний.');
            }
            
            // Меняем порядок текущего слайда слайда
            $carousel->order = $carousel->order + 1;
            $carousel->save();
            
            return Redirect::to('admin/carousel/index/')
                    ->with('success', 'Порядок успешно изменён.');
            
        } else {
            return Redirect::to('admin/carousel/index/')
                    ->with('error', 'Слайд не найден.');
        }
    }
    
    /**
     * Увеличивает порядок слайда
     * 
     * @param integer $id
     */
    public function getDecreaseOrder($id)
    {
        $carousel = Carousel::find($id);
        if ($carousel) { 
            // Меняем порядок предыд. слайда
            $slide_prev = Carousel::where('order', '=', ($carousel->order - 1))
                    ->first();
            if ($slide_prev) {
                $slide_prev->order = $slide_prev->order + 1;
                $slide_prev->save();
            } else {
                return Redirect::to('admin/carousel/index/')
                    ->with('error', 'Невозможно уменьшить порядок. Слайд и так первый.');
            }
            
            // Меняем порядок текущего слайда слайда
            $carousel->order = $carousel->order - 1;
            $carousel->save();
            
            return Redirect::to('admin/carousel/index/')
                    ->with('success', 'Порядок успешно изменён.');
        } else {
            return Redirect::to('admin/carousel/index/')
                    ->with('error', 'Слайд не найден.');
        }
    }
}
