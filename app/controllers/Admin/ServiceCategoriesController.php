<?php

namespace Admin;

use App, View, Validator, Input, Redirect, Str, Image, GlobalServiceCategory, ServiceCategory, Organization;

/**
 * Контроллер для админ-ия глобальных категорий услуг
 */
class ServiceCategoriesController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'organization_id' => 'required|integer|exists:organizations,id',
        'image' => 'mimes:jpeg,bmp,png,gif'
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'organization_id' => 'Организация',
        'image' => 'Изображение'
    );
    
    /**
     * Действие для отображения страницы с таблицой подкатегорий услуги
     */
    public function getIndex($global_service_id)
    {        
        $data['global_service'] = GlobalServiceCategory::find( $global_service_id );
                
        // Отображаем вид
        return View::make('admin.service_categories.index', $data);
    }
    
    /**
     * Действие для отображения страницы создания подкатегории услуги
     */
    public function getCreate($global_service_id)
    {
        $data['global_service'] = GlobalServiceCategory::find( $global_service_id );
        $data['organizations'] = Organization::orderBy('title')->get();
        
        // Отображаем вид
        return View::make('admin.service_categories.create', $data);
    }
    
    /**
     * Обработчик запроса на создание категории услуги
     */
    public function postCreate($id)
    {
        $service_category = new ServiceCategory;
        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            // Текстовые данные
            $service_category->title = trim(Input::get('title'));
            $service_category->organization_id = Input::get('organization_id');
            $service_category->global_service_category_id = $id;
            
            // Файл-изображение
            if (Input::hasFile('image')) {
                $image = Input::file('image');
                $new_path = public_path('img/service-categories/');
                
                $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();

                // Перемещаем изображение
                $image->move($new_path, $new_name);
                
                // Меняем его размер
                $img = Image::make($new_path.$new_name);
                $img->resize(50, 50);
                $img->save();
                
                $service_category->image = $new_name;
            }
            
            // Сохраняем и возвращаем
            $service_category->save();
            return Redirect::to('admin/service-categories/edit/'.$service_category->id)
                    ->with('success', 'Категория услуги успешно сохранена.');
        } else {
            return Redirect::to('admin/service-categories/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для отображения страницы реадктирования подкатегории услуги
     */
    public function getEdit($id)
    {
        $data['service_category'] = ServiceCategory::find($id);
        
        if ($data['service_category']) {     
            $data['organizations'] = Organization::orderBy('title')->get();
            
            // Отображаем вид
            return View::make('admin.service_categories.edit', $data);
        } else {
            App::abort(404, 'Категория услуги не найдена');
        }    
    }
    
    /**
     * Обработчик запроса на изменение данных подкатегории услуги
     */
    public function postEdit($id)
    {
        $service_category = ServiceCategory::find($id);
        if ($service_category) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames( $this->niceNames );               
            if ( !$validator->fails() ) {
                // Текстовые данные
                $service_category->title = trim(Input::get('title'));
                $service_category->organization_id = Input::get('organization_id');
                
                // Файл-изображение
                if (Input::hasFile('image')) {
                    $image = Input::file('image');
                    $new_path = public_path('img/service-categories/');
                    $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();

                    // Перемещаем изображение
                    $image->move($new_path, $new_name);

                    // Меняем его размер
                    $img = Image::make($new_path.$new_name);
                    $img->resize(50, 50);
                    $img->save();
                    
                    // Если есть прошлый файл, то удаляем
                    if ($service_category->image) {
                        $old_path_full = $new_path.$service_category->image;
                        if (file_exists($old_path_full)) {
                            unlink($old_path_full);
                        }
                    }

                    $service_category->image = $new_name;
                }
                
                // Сохраняем и возвращаем
                $service_category->save();
                return Redirect::to('admin/service-categories/edit/'.$id)
                        ->with('success', 'Категория услуга успешно сохранена.');
            } else {
                return Redirect::to('admin/service-categories/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Категория услуги не найдена');
        }   
    }

    /**
     * Действие для удаления подкатегории услуги
     */
    public function getDelete($id)
    {
        $service_category = ServiceCategory::find($id);
        if ($service_category) {             
            // Если есть изображение
            if ($service_category->image) {
                $path = public_path('img/service-categories/'.$service_category->image);
                if (file_exists($path)) {
                    unlink($path);
                }                
            }
            
            $id = $service_category->globalServiceCategory->id;
            $service_category->delete();
            return Redirect::to('admin/service-categories/index/'.$id)
                    ->with('success', 'Категория услуги успешно удалена.');
        }
    }
}