@extends('admin.master')

@section('scripts')
{{ HTML::script('assets/packages/ckeditor/ckeditor.js') }}
@endsection

@section('title')
Редактирование статьи <strong>"{{ $service->title }}"</strong>
@endsection

@section('content')
<p><a href="{{ action('Admin\ServicesController@getIndex', array('id' => $service->serviceCategory->id)) }}">Назад к списку статей</a></p>

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

@include('admin.services._form')

@endsection