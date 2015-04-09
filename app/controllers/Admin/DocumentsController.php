<?php

namespace Admin;

use App, View, Validator, Input, Redirect, DocumentCategory, Document, Mascame;

/**
 * Контроллер для админ-ия документов
 */
class DocumentsController extends BaseController {
    
    // Правила валидации вход. данных
    private $rules = array(
        'title' => 'required',
        'document_category_id' => 'required|integer|exists:documents_categories,id',
        'file' => 'mimes:doc,docx,rtf,pdf,djv,xls,xlsx,jpeg,bmp,gif,png,txt,rar,zip',
    );
    
    // Русские имена полей
    private $niceNames = array(
        'title' => 'Название',
        'document_category_id' => 'Категория документа',
        'file' => 'Файл',
    );

     /**
     * Действие для отображения страницы с таблицей документов
     */
    public function getIndex()
    {     
        $data['documents'] = Document::all();
                
        // Отображаем вид
        return View::make('admin.documents.index', $data);
    }
    
    /**
     * Действие для отображения страницы добавления документов
     */
    public function getCreate()
    {        
        // Категории документов
        $data['categories'] = DocumentCategory::orderBy('title')->get();
        
        // Отображаем вид
        return View::make('admin.documents.create', $data);
    }
    
    /**
     * Дейсвтие для редактирвоание документа
     * 
     * @param integer $id Идент-ор документа
     */
    public function getEdit($id)
    {                
        $data['document'] = Document::find($id);
        
        if ($data['document']) {     
            // Категории документов
            $data['categories'] = DocumentCategory::orderBy('title')->get();
        
            return View::make('admin.documents.edit', $data);
        } else {
            App::abort(404, 'Документ не найден');
        }        
    }
    
    /**
     * Обработчик запроса на редактирование документа
     * 
     * @param integer $id
     */
    public function postEdit($id)
    {
        $document = Document::find($id);
        if ($document) {    
            // Валидация полей
            $validator = Validator::make(Input::all(), $this->rules);
            $validator->setAttributeNames($this->niceNames);               
            if (!$validator->fails()) {
                // Текстовые данные
                $document->title = trim(Input::get('title'));     
                $document->document_category_id = Input::get('document_category_id');
                
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    $new_path = public_path('files/documents/');
                    $new_name = Mascame\Urlify::transliterate($file->getClientOriginalName());

                    // Если есть прошлый файл, то удаляем
                    if ($document->file) {
                        $old_path_full = $new_path.$document->file;
                        if (file_exists($old_path_full)) {
                            unlink($old_path_full);
                        }
                    }
                    
                    // Размер файла
                    $document->size = number_format(($file->getSize() / 1024), 2);

                    // Перемещаем файл
                    $file->move($new_path, $new_name);

                    $document->file = $new_name;
                }  
                
                // Сохраняем и возвращаем
                $document->save();
                return Redirect::to('admin/documents/edit/'.$id)
                        ->with('success', 'Документ успешно сохранен.');
            } else {
                return Redirect::to('admin/documents/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
            }
        } else {
            App::abort(404, 'Документ не найден');
        }   
    }
    
    /**
     * Обработчик запроса на добавление документа
     */
    public function postCreate()
    {        
        // Валидация полей
        $this->rules['file'] .= '|required'; 
        $validator = Validator::make(Input::all(), $this->rules);
        $validator->setAttributeNames($this->niceNames);               
        if (!$validator->fails()) {
            
            $document = new Document;
            
            // Текстовые данные
            $document->title = trim(Input::get('title'));
            $document->document_category_id = Input::get('document_category_id');

            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $new_path = public_path('files/documents/');
                $new_name = Mascame\Urlify::transliterate($file->getClientOriginalName());
                
                // Размер файла
                $document->size = number_format(($file->getSize() / 1024), 2);
                
                // Перемещаем файл
                $file->move($new_path, $new_name);
                
                $document->file = $new_name;
            }            
            
            // Сохраняем и возвращаем
            $document->save();
            return Redirect::to('admin/documents/edit/'.$document->id)
                    ->with('success', 'Документ успешно сохранен.');
        } else {
            return Redirect::to('admin/documents/create/')
                    ->withErrors($validator)->withInput();
        }
    }
    
    /**
     * Действие для удаления документа
     * 
     * @param integer $id
     */
    public function getDelete($id)
    {
        $document = Document::find($id);
        if ($document) {           
            // Если есть прошлый файл, то удаляем
            if ($document->file) {
                $new_path = public_path('files/documents/');
                $old_path_full = $new_path.$document->file;
                if (file_exists($old_path_full)) {
                    unlink($old_path_full);
                }
            }
            
            $document->delete();
            return Redirect::to('admin/documents/index/')
                    ->with('success', 'Документ успешно удален.');
        } else {
            App::abort(404, 'Документ не найден');
        }
    }
}
