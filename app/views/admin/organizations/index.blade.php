@extends('admin.master')

@section('scripts')
    {{ HTML::script('js/backend/organizations/organizations.min.js') }}
@endsection

@section('title')
    Список ведомств
@endsection

@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

<p><a class="btn btn-primary" href="{{ action('Admin\OrganizationsController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a></p>

<table id="organizations" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Количество услуг</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th width="5%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($organizations as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->serviceCategories->count() }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->updated_at)) }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ action('Admin\OrganizationsController@getEdit', array('id' => $item->id)) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\OrganizationsController@getDelete', array('id' => $item->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection