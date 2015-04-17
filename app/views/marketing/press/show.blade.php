@extends('marketing.master')

@section('title')
СМИ о нас
@endsection

@section('content')
    
<div class="row">

    <h3>СМИ о нас</h3>
    
    <div>                
        {{ $press->full_text }}
    </div>
    
</div>

@endsection