@extends('admin.master')

@section('scripts')
{{ HTML::script('js/backend/services/services.min.js') }}
@endsection

@section('title')
Список статей подкатегории услуги <strong>{{ $service_category->title }}</strong>
@endsection

@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

<p><a href="{{ action('Admin\ServiceCategoriesController@getIndex', array('id' => $service_category->globalServiceCategory->id)) }}"> Назад к подкатегориям услуги</a></p>

<p><a class="btn btn-primary" href="{{ action('Admin\ServicesController@getCreate', array('id' => $service_category->id)) }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a></p>

<table id="services" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th width="10%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($service_category->services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->title }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($service->created_at)) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($service->updated_at)) }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ action('Admin\ServicesController@getEdit', array('id' => $service->id)) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\ServicesController@getDelete', array('id' => $service->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection