@extends('admin.master')

@section('title')
Создание категории документов
@endsection

@section('content')
<p><a href="{{ action('Admin\DocumentCategoriesController@getIndex') }}">Назад к списку категорий</a></p>

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

@include('admin.document_categories._form')

<p><a href="{{ action('Admin\DocumentCategoriesController@getIndex') }}">Назад к списку категорий</a></p>
@endsection