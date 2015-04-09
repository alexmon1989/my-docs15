@extends('admin.master')

@section('title')
Создание администратора
@endsection

@section('content')
<p><a href="{{ action('Admin\UsersController@getIndex') }}">Назад к списку администраторов</a></p>

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

@include('admin.users._form')

<p><a href="{{ action('Admin\UsersController@getIndex') }}">Назад к списку администраторов</a></p>
@endsection