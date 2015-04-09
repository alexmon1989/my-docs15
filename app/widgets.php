<?php

/**
 * Виджет для карусели (слайдера)
 */
Widget::register('carousel', function()
{    
    // Получаем слайды
    $data['slides'] = Carousel::where('enabled', '=', 1)
            ->orderBy('order', 'ASC')
            ->get();
    
    // Создаём вид
    return View::make('marketing.widgets.carousel', $data);
});

/**
 * Виджет для глобальных категорий услуг
 */
Widget::register('global_service_categories', function()
{    
    $data['global_service_categories'] = GlobalServiceCategory::orderBy('id', 'ASC')
            ->get();
    
    $data['organizations'] = Organization::orderBy('id', 'ASC')
            ->get();
    
    // Создаём вид
    return View::make('marketing.widgets.global_service_categories', $data);
});

/**
 * Виджет для выбора центра
 */
Widget::register('centreChoosing', function()
{    
    $data['centres'] = Centre::orderBy('title', 'ASC')
            ->get();
    
    // Создаём вид
    return View::make('marketing.widgets.centre_choosing', $data);
});

/**
 * Виджет информации о центре
 */
Widget::register('centreInfo', function()
{    
    // Проверяем есть ли у нас в сессии выбранный центр
    $id = Session::get('centre_id');
    
    if ($id) {    
        $data['centre'] = Centre::find($id);
    }
    if (!$id or !$data['centre']) {
        $data['centre'] = Centre::first();
    }
    
    // Создаём вид
    return View::make('marketing.widgets.centre_info', $data);
});