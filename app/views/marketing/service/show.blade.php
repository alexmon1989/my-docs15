@extends('marketing.master')

@section('title')
{{ $service->title }}
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li>Услуги</li>
            <li><a href="{{ action('Marketing\GlobalServiceCategoriesController@getShow', array('id' => $service->ServiceCategory->globalServiceCategory->id)) }}">{{ $service->ServiceCategory->globalServiceCategory->title }}</a></li>
            <li><a href="{{ action('Marketing\ServiceCategoriesController@getShow', array('id' => $service->ServiceCategory->id)) }}">{{ $service->ServiceCategory->title }}</a></li>
        </ol>
        
        <h3>{{ $service->title }}</h3>
        
        <div>
            {{ $service->full_text }}
        </div>
        
        
        @if ($service->note and $service->note != '')
        <div>
            <strong><i>Примечание:</i></strong> {{ $service->note }}
        </div>
        @endif
    </div>
@endsection