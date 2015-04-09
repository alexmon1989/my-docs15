@extends('marketing.master')

@section('title')
{{ $organization->title }}
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li>Услуги</li>
            <li class="active">{{ $organization->title }}</li>
        </ol>
        
        @for ($i = 0; $i < $organization->serviceCategories->count(); $i += 2)
        <div class="row">
            @if (isset($organization->serviceCategories[$i]))
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        @if ($organization->serviceCategories[$i]->image)
                        {{ HTML::image('img/service-categories/'.$organization->serviceCategories[$i]->image, $organization->serviceCategories[$i]->title, array('class' => 'img-rounded', 'width' => '50', 'height' => '50')) }}
                        @endif
                    </div>
                    <div class="col-md-10">
                        <strong><a href="{{ action('Marketing\ServiceCategoriesController@getShow', array('id' => $organization->serviceCategories[$i]->id)) }}">{{ $organization->serviceCategories[$i]->title }}</a></strong>
                    </div>
                </div>
            </div>
            @endif
            
            @if (isset($organization->serviceCategories[$i+1]))
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        @if ($organization->serviceCategories[$i+1]->image)
                        {{ HTML::image('img/service-categories/'.$organization->serviceCategories[$i+1]->image, $organization->serviceCategories[$i+1]->title, array('class' => 'img-rounded', 'width' => '50', 'height' => '50')) }}
                        @endif
                    </div>
                    <div class="col-md-10">
                        <strong><a href="{{ action('Marketing\ServiceCategoriesController@getShow', array('id' => $organization->serviceCategories[$i+1]->id)) }}">{{ $organization->serviceCategories[$i+1]->title }}</a></strong>
                    </div>
                </div>
            </div>
            @endif
                    
        </div>
        @endfor
    </div>
@endsection