@extends('marketing.master')

@section('title')
{{ $service_category->title }}
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li>Услуги</li>
            <li><a href="{{ action('Marketing\GlobalServiceCategoriesController@getShow', array('id' => $service_category->globalServiceCategory->id)) }}">{{ $service_category->globalServiceCategory->title }}</a></li>
            <li class="active">{{ $service_category->title }}</li>
        </ol>
        
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @foreach ($service_category->services as $service)
                    <li><strong><a href="{{ action('Marketing\ServicesController@getShow', array('id' => $service->id)) }}">{{ $service->title }}</a></strong></li>
                    @endforeach            
                </ul>
            </div>
        </div>
    </div>
@endsection