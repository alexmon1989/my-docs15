<?php

namespace Admin;

use App, View, Validator, Input, Str, Redirect, Image, Mascame, Centre, Photo, CentreFile;

/**
 * Контроллер для админ-ия центров МФЦ
 */
class CentresController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'hot_line' => '',
        'address' => 'required',
        'call_centre' => '',
        'email' => 'email',
        'director' => '',
        'latitude' => 'numeric',
        'longtitude' => 'numeric',
        'add_data' => '',
        'how_to_get' => '',
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'hot_line' => 'Горячая линия',
        'address' => 'Адрес',
        'call_centre' => 'Call-центр',
        'email' => 'E-Mail',
        'director' => 'Директор',
        'latitude' => 'Широта',
        'longtitude' => 'Долгота',
        'add_data' => 'Дополнительные данные',
        'how_to_get' => 'Как добраться',
    );

     /**
     * Действие для отображения страницы с таблицей центров МФЦ
     */
    public function getIndex()
    {        
        $data['centres'] = Centre::all();
                
        // Отображаем вид
        return View::make('admin.centres.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления центра
     */
    public function getCreate()
    {        
        // Отображаем вид
        return View::make('admin.centres.create');
    }
    
    /**
     * Дейсвтие для редактирвоание центра
     * 
     * @param integer $id Идент-ор новости
     */
    public function getEdit($id)
    {     
        $data['centre'] = Centre::find($id);
        
        if ($data['centre']) {                 
            // Мин. и макс. порядки фотографий
            $data['max_order_photo'] = $data['centre']->photos->max('order');
            $data['min_order_photo'] = $data['centre']->photos->min('order');
            
            return View::make('admin.centres.edit', $data);
        } else {
            App::abort(404, 'Центр не найден');
        }                   
    }
    
    /**
     * Обработчик запроса на редактирование центра
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $centre = Centre::find($id);
        if ($centre) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $centre->title = trim(Input::get('title'));
                $centre->hot_line = trim(Input::get('hot_line'));
                $centre->address = trim(Input::get('address'));
                $centre->call_centre = trim(Input::get('call_centre'));
                $centre->email = trim(Input::get('email'));
                $centre->director = trim(Input::get('director'));
                $centre->latitude = trim(Input::get('latitude'));
                $centre->longtitude = trim(Input::get('longtitude'));
                $centre->add_data = trim(Input::get('add_data'));
                $centre->how_to_get = trim(Input::get('how_to_get'));
                $centre->vacancies = trim(Input::get('vacancies'));
                
                // Сохраняем и возвращаем
                $centre->save();
                return Redirect::to('admin/centres/edit/'.$id)
                        ->with('success', 'Центр успешно сохранён.');
            } else {
                return Redirect::to('admin/centres/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Центр не найден');
        }           
    }
    
    /**
     * Обработчик запроса на добавление центра
     * 
     * @param integer $id
     */
    public function postCreate()
    {
        $centre = new Centre;
        
        // Валидация полей
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            // Текстовые данные
            $centre->title = trim(Input::get('title'));
            $centre->hot_line = trim(Input::get('hot_line'));
            $centre->address = trim(Input::get('address'));
            $centre->call_centre = trim(Input::get('call_centre'));
            $centre->email = trim(Input::get('email'));
            $centre->director = trim(Input::get('director'));
            $centre->latitude = trim(Input::get('latitude'));
            $centre->longtitude = trim(Input::get('longtitude'));
            $centre->add_data = trim(Input::get('add_data'));
            $centre->how_to_get = trim(Input::get('how_to_get'));
            $centre->vacancies = trim(Input::get('vacancies'));

            // Сохраняем и возвращаем
            $centre->save();
            return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('success', 'Центр успешно сохранён.');
        } else {
            return Redirect::to('admin/centres/create/')
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
        $centre = Centre::find($id);
        if ($centre) {             
            
            // Удаляем фотографии            
            $path = public_path('img/centres/');        
            $centre->photos->each(function($p) use ($path) {            
                $path_full = $path.$p->file_name;
                if (file_exists($path_full)) {
                    unlink($path_full);
                }
            });
            
            // Удаляем файлы
            $path = public_path('files/centres/'.$id.'/'); 
            $centre->files->each(function($p) use ($path) {            
                $path_full = $path.$p->file_name;
                if (file_exists($path_full)) {
                    unlink($path_full);
                }
            });
            rmdir($path);
            
            $centre->delete();
            return Redirect::to('admin/centres/index/')
                    ->with('success', 'Центр удалён.');
        }
    }
    
    /**
     * Увеличивает порядок изображения
     * 
     * @param type $id
     */
    public function getIncreasePicOrder($id)
    {
        $photo = Photo::find($id);
                
        if ($photo) { 
            // Центр, которому принадлежит фото
            $centre = $photo->centre->first();
            
             // Меняем порядок следующего слайда
            $photo_next = $centre->photos->filter(function($p) use ($photo) {
                if ($p->order == ($photo->order + 1)) {
                    return true;
                }
            })->first();
            if ($photo_next) {
                $photo_next->order = $photo_next->order - 1;
                $photo_next->save();
            } else {
                return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('error', 'Невозможно увеличить порядок. Слайд и так уже последний.');
            }
                              
            // Меняем порядок текущего слайда слайда
            $photo->order = $photo->order + 1;
            $photo->save();
            
            return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('success', 'Порядок успешно изменён.');
            
        } else {
            return Redirect::to('admin/centres/index/')
                    ->with('error', 'Фото не найдено.');
        }
    }
    
    /**
     * Уменьшает порядок изображения
     * 
     * @param type $id
     */
    public function getDecreasePicOrder($id) 
    {
        $photo = Photo::find($id);
                
        if ($photo) { 
            // Центр, которому принадлежит фото
            $centre = $photo->centre->first();
            
             // Меняем порядок следующего слайда
            $photo_next = $centre->photos->filter(function($p) use ($photo) {
                if ($p->order == ($photo->order - 1)) {
                    return true;
                }
            })->first();
            if ($photo_next) {
                $photo_next->order = $photo_next->order + 1;
                $photo_next->save();
            } else {
                return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('error', 'Невозможно уменьшить порядок. Слайд и так уже первый.');
            }
                              
            // Меняем порядок текущего слайда слайда
            $photo->order = $photo->order - 1;
            $photo->save();
            
            return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('success', 'Порядок успешно изменён.');
            
        } else {
            return Redirect::to('admin/centres/index/')
                    ->with('error', 'Фото не найдено.');
        }
    }
    
    /**
     * Удаляет изображение
     * 
     * @param integer $id
     */
    public function getDeletePic($id) 
    {
        $photo = Photo::find($id);
                
        if ($photo) { 
            
            // Центр, которому принадлежит фото
            $centre = $photo->centre->first();
            
            // Меняем порядок всем слайдам, которые идут за этим            
            $centre->photos->each(function($p) use ($photo) {
                if ($p->order > $photo->order) {
                    $p->order = $p->order - 1;
                    $p->save();
                }
            });
            
            $path = public_path('img/centres/');                    
            $path_full = $path.$photo->file_name;
            if (file_exists($path_full)) {
                unlink($path_full);
            }
            $photo->delete();
                                     
            return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('success', 'Фото успешно удалено.');
            
        } else {
            return Redirect::to('admin/centres/index/')
                    ->with('error', 'Фото не найдено.');
        }
    }
    
    /**
     * Обработчик запроса на добавление фото
     * 
     * @param inteeger $id id центра
     */
    public function postAddPhoto($id)
    {
        $centre = Centre::find($id);
        if ($centre) {
            // Валидация полей
            $rules['file_name'] = 'required|mimes:jpeg,png,gif'; 
            $nice_names['file_name'] = 'Фото'; 
            $validator = Validator::make(Input::all(), $rules);
            $validator->setAttributeNames($nice_names);               
            if (!$validator->fails()) {  
                $photo = new Photo;
                $photo->order = $centre->photos->max('order') + 1;

                // Файл-изображение
                if (Input::hasFile('file_name')) {
                    $image = Input::file('file_name');
                    $new_path = public_path('img/centres/');
                    $new_name = Str::random(20).'.'.$image->getClientOriginalExtension();
                    $image->move($new_path, $new_name);

                    // Меняем его размер
                    $img = Image::make($new_path.$new_name);
                    $img->resize(855, 400);
                    $img->save();

                    $photo->file_name = $new_name;
                }

                // Сохраняем и возвращаем
                $centre->photos()->save($photo);
                
                return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('success', 'Фото успешно сохранено.');
            } else {
                return Redirect::to('admin/centres/edit/'.$centre->id)
                        ->withErrors($validator)->withInput();
            }
        }    
    }
    
    /**
     * Обработчик запроса на добавление файла
     * 
     * @param inteeger $id id центра
     */
    public function postAddFile($id)
    {
        $centre = Centre::find($id);
        if ($centre) {
            // Валидация полей
            $rules['file_name'] = 'required|mimes:doc,docx,rtf,pdf,djv,xls,xlsx,jpeg,bmp,gif,png,txt,rar,zip'; 
            $nice_names['file_name'] = 'Файл'; 
            $validator = Validator::make(Input::all(), $rules);
            $validator->setAttributeNames($nice_names);               
            if (!$validator->fails()) {  
                $centre_file = new CentreFile;

                // Файл-изображение
                if (Input::hasFile('file_name')) {
                    $file = Input::file('file_name');
                    $new_path = public_path('files/centres/'.$id.'/');
                    if (!file_exists($new_path)) {
                        mkdir($new_path, 0777);
                    }
                    $new_name = Mascame\Urlify::transliterate($file->getClientOriginalName());

                    // Проверяем, не существует ли такого файла уже
                    if (!file_exists($new_path.$new_name)) {
                        // Перемещаем файл
                        $file->move($new_path, $new_name);

                        $centre_file->centre_id = $id;
                        $centre_file->title = $file->getClientOriginalName();
                        $centre_file->file_name = $new_name;
                        
                        // Сохраняем и возвращаем
                        $centre_file->save();

                        return Redirect::to('admin/centres/edit/'.$centre->id)
                                    ->with('success', 'Файл успешно сохранен.');
                    } else {
                        return Redirect::to('admin/centres/edit/'.$centre->id)
                                ->withErrors('Файл с таким названием уже существует на сервере!')
                                ->withInput();
                    }
                }

                
            } else {
                return Redirect::to('admin/centres/edit/'.$centre->id)
                        ->withErrors($validator)->withInput();
            }
        }    
    }
    
    /**
     * Удаляет файл
     * 
     * @param integer $id
     */
    public function getDeleteFile($id) 
    {
        $centre_file = CentreFile::find($id);
                
        if ($centre_file) {             
            // Центр, которому принадлежит файл
            $centre = $centre_file->centre;
            
            $path = public_path('files/centres/'.$centre->id.'/');                   
            $path_full = $path.$centre_file->file_name;
            if (file_exists($path_full)) {
                unlink($path_full);
            }
            $centre_file->delete();
                                     
            return Redirect::to('admin/centres/edit/'.$centre->id)
                    ->with('success', 'Файл успешно удален.');
            
        } else {
            return Redirect::to('admin/centres/index/')
                    ->with('error', 'Файл не найден.');
        }
    }
}