@extends('admin.master')

@section('scripts')
    {{ HTML::script('js/backend/service-categories/service-categories.min.js') }}
@endsection

@section('title')
Список подкатегорий услуги <strong>{{ $global_service->title }}</strong>
@endsection

@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

<p><a href="{{ action('Admin\GlobalServiceCategoriesController@getIndex', array('id' => $global_service->id)) }}"> Назад к списку услуг</a></p>

<p><a class="btn btn-primary" href="{{ action('Admin\ServiceCategoriesController@getCreate', array('id' => $global_service->id)) }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a></p>

<table id="service-categories" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Организация</th>
            <th>Количество статей</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th width="10%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($global_service->serviceCategories as $service_category)
        <tr>
            <td>{{ $service_category->id }}</td>
            <td>{{ $service_category->title }}</td>
            <td>{{ ($service_category->organization) ? link_to(action('Admin\OrganizationsController@getEdit', array('id' => $service_category->organization->id)), $service_category->organization->title, array('title' => 'Редактировать ведомство' )) : '' }}</td>
            <td>{{ $service_category->services->count() }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($service_category->created_at)) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($service_category->updated_at)) }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ action('Admin\ServicesController@getIndex', array('id' => $service_category->id)) }}" title="Список статей"><span class="glyphicon glyphicon-list"></span></a>
                <a class="btn btn-primary btn-sm" href="{{ action('Admin\ServiceCategoriesController@getEdit', array('id' => $service_category->id)) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\ServiceCategoriesController@getDelete', array('id' => $service_category->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection