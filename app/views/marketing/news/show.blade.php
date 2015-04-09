@extends('marketing.master')

@section('title')
{{ $news->title }}
@endsection

@section('content')

    <div class="row">
        <h3><a href="{{ action('Marketing\NewsController@getIndex') }}">Новости</a> :: {{ $news->title }}</h3>
        
        <span id="helpBlock" class="help-block">
            {{ date('d.m.Y', strtotime($news->created_at)) }}
        </span>
        
        <div>                
            {{ $news->full_text }}
        </div>
    </div>
@endsection