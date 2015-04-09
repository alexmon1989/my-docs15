@extends('admin.master')

@section('title')
Создание категории услуги
@endsection

@section('content')
<p><a href="{{ action('Admin\ServiceCategoriesController@getIndex', array('id' => $global_service->id)) }}">Назад к списку категорий</a></p>

@if (Session::get('errors'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Ошибка!</h4>
    @foreach (Session::get('errors')->getMessages() as $msg) 
        @foreach ($msg as $value)
            {{ $value }}<br>
        @endforeach
    @endforeach    
</div>
@endif

@include('admin.service_categories._form')

@endsection