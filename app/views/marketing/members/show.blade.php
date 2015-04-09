@extends('marketing.master')

@section('title')
Участники МФЦ
@endsection

@section('content')
    
<div class="row">

    <h3>Участники МФЦ</h3>

    @for ($i = 0; $i < $members->count(); $i += 2)
    
    <div class="row member">
        <div class="col-md-6">
            @if (isset($members[$i]))
            <div class="row">
                <div class="col-md-3">
                    @if ($members[$i]->image) 
                    {{ HTML::image('img/members/'.$members[$i]->image, $members[$i]->title) }}
                    @endif
                </div>
                <div class="col-md-9">
                    <strong>{{ HTML::link( $members[$i]->url, $members[$i]->title, array('target' => '_blank') ) }}</strong>
                </div>
            </div>
            @endif
        </div>
        
        <div class="col-md-6">
            @if (isset($members[$i+1]))
            <div class="row">
                <div class="col-md-3">
                    @if ($members[$i+1]->image) 
                    {{ HTML::image('img/members/'.$members[$i+1]->image, $members[$i+1]->title) }}
                    @endif
                </div>
                <div class="col-md-9">
                    <strong>{{ HTML::link( $members[$i+1]->url, $members[$i+1]->title, array('target' => '_blank') ) }}</strong>
                </div>
            </div>
            @endif
        </div>
    </div>
    
    @endfor
</div>

@endsection