@extends('marketing.master')

@section('title')
{{ $global_category->title }}
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li>Услуги</li>
            <li class="active">{{ $global_category->title }}</li>
        </ol>
        
        @for ($i = 0; $i < $global_category->serviceCategories->count(); $i += 2)
        <div class="row">
            @if (isset($global_category->serviceCategories[$i]))
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        @if ($global_category->serviceCategories[$i]->image)
                        {{ HTML::image('img/service-categories/'.$global_category->serviceCategories[$i]->image, $global_category->serviceCategories[$i]->title, array('class' => 'img-rounded', 'width' => '50', 'height' => '50')) }}
                        @endif
                    </div>
                    <div class="col-md-10">
                        <strong><a href="{{ action('Marketing\ServiceCategoriesController@getShow', array('id' => $global_category->serviceCategories[$i]->id)) }}">{{ $global_category->serviceCategories[$i]->title }}</a></strong>
                    </div>
                </div>
            </div>
            @endif
            
            @if (isset($global_category->serviceCategories[$i+1]))
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        @if ($global_category->serviceCategories[$i+1]->image)
                        {{ HTML::image('img/service-categories/'.$global_category->serviceCategories[$i+1]->image, $global_category->serviceCategories[$i+1]->title, array('class' => 'img-rounded', 'width' => '50', 'height' => '50')) }}
                        @endif
                    </div>
                    <div class="col-md-10">
                        <strong><a href="{{ action('Marketing\ServiceCategoriesController@getShow', array('id' => $global_category->serviceCategories[$i+1]->id)) }}">{{ $global_category->serviceCategories[$i+1]->title }}</a></strong>
                    </div>
                </div>
            </div>
            @endif
                    
        </div>
        @endfor
    </div>
@endsection