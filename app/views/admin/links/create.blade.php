@extends('admin.master')

@section('title')
Создание полезной ссылки
@endsection

@section('content')
<p><a href="{{ action('Admin\LinksController@getIndex') }}">Назад к списку ссылок</a></p>

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

@include('admin.links._form')

<p><a href="{{ action('Admin\LinksController@getIndex') }}">Назад к списку ссылок</a></p>
@endsection