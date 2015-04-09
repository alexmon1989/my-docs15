@extends('marketing.master')

@section('title')
Полезные ссылки
@endsection

@section('content')
    
<div class="row">

    <h3>Полезные ссылки</h3>

    @for ($i = 0; $i < $links->count(); $i += 2)
    
    <div class="row links-row">
        <div class="col-md-6">
            @if (isset($links[$i]))
            <div class="row">
                <div class="col-md-7">
                    {{ HTML::image('img/links/'.$links[$i]->image, $links[$i]->title) }}
                </div>
                <div class="col-md-5">
                    <strong>{{ HTML::link( $links[$i]->url, $links[$i]->title, array('target' => '_blank') ) }}</strong>
                </div>
            </div>
            @endif
        </div>
        
        <div class="col-md-6">
            @if (isset($links[$i+1]))
            <div class="row">
                <div class="col-md-7">
                    {{ HTML::image('img/links/'.$links[$i+1]->image, $links[$i+1]->title) }}
                </div>
                <div class="col-md-5">
                    <strong>{{ HTML::link( $links[$i+1]->url, $links[$i+1]->title, array('target' => '_blank') ) }}</strong>
                </div>
            </div>
            @endif
        </div>
    </div>
    
    @endfor
</div>

@endsection