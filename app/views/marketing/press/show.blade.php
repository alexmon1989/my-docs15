@extends('marketing.master')

@section('title')
Пресса о нас
@endsection

@section('content')
    
<div class="row">

    <h3>Пресса о нас</h3>
    
    <div>                
        {{ $press->full_text }}
    </div>
    
</div>

@endsection