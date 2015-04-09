@extends('admin.master')

@section('scripts')
    {{ HTML::script('js/backend/global-categories/global-categories.min.js') }}
@endsection

@section('title')
    Список услуг
@endsection

@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

<p><a class="btn btn-primary" href="{{ action('Admin\GlobalServiceCategoriesController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a></p>

<table id="global-categories" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Количество подкатегорий</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th width="10%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($global_services as $global_service)
        <tr>
            <td>{{ $global_service->id }}</td>
            <td>{{ $global_service->title }}</td>
            <td>{{ $global_service->serviceCategories->count() }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($global_service->created_at)) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($global_service->updated_at)) }}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{ action('Admin\ServiceCategoriesController@getIndex', array('id' => $global_service->id)) }}" title="Список подкатегорий"><span class="glyphicon glyphicon-list"></span></a>
                <a class="btn btn-primary btn-sm" href="{{ action('Admin\GlobalServiceCategoriesController@getEdit', array('id' => $global_service->id)) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\GlobalServiceCategoriesController@getDelete', array('id' => $global_service->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection