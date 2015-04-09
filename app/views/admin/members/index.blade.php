@extends('admin.master')

@section('scripts')
    {{ HTML::script('js/backend/members/members.min.js') }}
@endsection

@section('title')
    Список участников МФЦ
@endsection

@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

<p><a class="btn btn-primary" href="{{ action('Admin\MembersController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a></p>

<table id="members" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>URL</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th width="5%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($members as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ link_to($item->url, $item->url, array('target' => '_blank')) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->updated_at)) }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ action('Admin\MembersController@getEdit', array('id' => $item->id)) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\MembersController@getDelete', array('id' => $item->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection