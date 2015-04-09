@extends('admin.master')

@section('title')
Список подкатегорий услуги <strong>"{{ $global_service->title }}"</strong>
@endsection

@section('content')
<p><a href="{{ action('Admin\GlobalServiceCategoriesController@getIndex') }}">Назад к списку услуг</a></p>

@endsection