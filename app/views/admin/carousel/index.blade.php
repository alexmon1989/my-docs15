@extends('admin.master')

@section('scripts')
    {{ HTML::script('js/backend/carousel/carousel.min.js') }}
@endsection

@section('title')
    Список слайдов
@endsection

@section('content')

@if (Session::get('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>Успех!</h4>
    {{ Session::get('success') }} 
</div>
@endif

<p><a class="btn btn-primary" href="{{ action('Admin\CarouselController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a></p>

<table id="carousel" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th width="15%">Изображение</th>
            <th>Порядок</th>
            <th>Включено</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th width="5%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($slides as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td><img src="{{ url( Config::get('carousel.imgs_url').'/'.$item->filename ) }}" alt="{{ $item->title }}" height="150"></td>
            <td>{{ $item->order }}&nbsp;
                @if ($item->order != $min_order)
                <a href="{{ action('Admin\CarouselController@getDecreaseOrder', array('id' => $item->id)) }}" title="Поднять"><i class="fa fa-arrow-up fa-fw"></i></a>&nbsp;
                @endif
                @if ($item->order != $max_order)
                <a href="{{ action('Admin\CarouselController@getIncreaseOrder', array('id' => $item->id)) }}" title="Опустить"><i class="fa fa-arrow-down fa-fw"></i></a>
                @endif
            </td>
            <td>{{ $item->enabled ? 'Да' : 'Нет' }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}</td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->updated_at)) }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ action('Admin\CarouselController@getEdit', array('id' => $item->id)) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\CarouselController@getDelete', array('id' => $item->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection