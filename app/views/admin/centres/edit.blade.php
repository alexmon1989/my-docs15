@extends('admin.master')

@if ($centre->latitude and $centre->longtitude)
@section('head_scripts')
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
{{ HTML::script('assets/packages/ckeditor/ckeditor.js') }}
@endsection
@endif

@section('title')
Редактирование центра <strong>"{{ $centre->title }}"</strong>
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

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

@include('admin.centres._form')

@include('admin.centres.images')

@include('admin.centres.files')

<p><a href="{{ action('Admin\CentresController@getIndex') }}">Назад к списку центров</a></p>

@endsection