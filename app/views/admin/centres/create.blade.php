@extends('admin.master')

@section('head_scripts')
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
{{ HTML::script('assets/packages/ckeditor/ckeditor.js') }}
@endsection

@section('title')
Создание центра
@endsection

@section('content')
<p><a href="{{ action('Admin\CentresController@getIndex') }}">Назад к списку центров</a></p>

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

@include('admin.centres._form')

<p><a href="{{ action('Admin\CentresController@getIndex') }}">Назад к списку центров</a></p>
@endsection