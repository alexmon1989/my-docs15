<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Роуты для пользовательской части
Route::get('/', 'Marketing\MainController@showMain');
Route::controller('news', 'Marketing\NewsController');
Route::controller('services/global-categories', 'Marketing\GlobalServiceCategoriesController');
Route::controller('services/organizations', 'Marketing\OrganizationsController');
Route::controller('services/categories', 'Marketing\ServiceCategoriesController');
Route::controller('services', 'Marketing\ServicesController');
Route::get('centre', 'Marketing\CentreController@getShow');
Route::get('members', 'Marketing\MembersController@getShow');
Route::get('links', 'Marketing\LinksController@getShow');
Route::get('press', 'Marketing\PressController@getShow');
Route::get('documents', 'Marketing\DocumentsController@getShow');
Route::get('queue', 'Marketing\QueueController@getShow');

// Роуты для ajax-запросов
Route::controller('api', 'API\ApiController');

// Авторизация
Route::controller('admin/auth', 'Admin\AuthController');
    
Route::group(array('before' => 'auth'), function()
{
    // Роуты для админ-части
    Route::get('admin/dashboard', 'Admin\DashboardController@getShow');
    Route::controller('admin/news', 'Admin\NewsController');
    Route::controller('admin/global-categories', 'Admin\GlobalServiceCategoriesController');
    Route::controller('admin/service-categories', 'Admin\ServiceCategoriesController');
    Route::controller('admin/services', 'Admin\ServicesController');
    Route::controller('admin/organizations', 'Admin\OrganizationsController');
    Route::controller('admin/centres', 'Admin\CentresController');
    Route::controller('admin/members', 'Admin\MembersController');
    Route::controller('admin/links', 'Admin\LinksController');
    Route::controller('admin/carousel', 'Admin\CarouselController');
    Route::controller('admin/document-categories', 'Admin\DocumentCategoriesController');
    Route::controller('admin/documents', 'Admin\DocumentsController');
    Route::controller('admin/videos', 'Admin\VideosController');
    Route::controller('admin/users', 'Admin\UsersController');
    Route::controller('admin/press', 'Admin\PressController');
    
    // Роуты для elfinder (менеджер загрузки изображений для CKEDITOR)
    \Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    \Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
    \Route::get('elfinder/ckeditor4', 'Barryvdh\Elfinder\ElfinderController@showCKeditor4');
});