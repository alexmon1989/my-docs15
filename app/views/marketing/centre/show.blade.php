@extends('marketing.master')

@if ($centre->latitude and $centre->longtitude)
@section('head_scripts')
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
@endsection
@endif

@section('title')
О центре
@endsection

@section('content')
    
    
    <div class="row">
        
        <h3>Информация о центре</h3>
        <dl class="dl-horizontal">
            <dt>Адрес:</dt>
            <dd>{{{ $centre->address }}}</dd>
            <dt>Call-центр:</dt>
            <dd>{{{ $centre->call_centre }}}</dd>
            <dt>Email:</dt>
            <dd>{{ HTML::mailto($centre->email) }}</dd>
            <dt>Руководитель:</dt>
            <dd>{{{ $centre->director }}}</dd>            
        </dl>
    </div>    
    
    <div class="row">
        <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">            
                @for ($i = 0; $i < $centre->photos->count(); $i++)
                <li data-target="#carousel-example-captions" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
                @endfor
            </ol>
            <div class="carousel-inner" role="listbox">
                @for ($i = 0; $i < $centre->photos->count(); $i++)
                    <div class="item {{ $i == 0 ? 'active' : '' }}">
                        <img src="{{ url( '/img/centres/'.$centre->photos[$i]->file_name ) }}" alt="{{ $centre->title }}">
                    </div>
                @endfor
            </div>
            <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Назад</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Вперёд</span>
            </a>
        </div>
    </div>
    
    <div class="row">
        <h4>Расположение:</h4>        
        <div id="map"></div>
    </div>

    @if ($centre->how_to_get)
    <div class="row">
        <h4>Как добраться:</h4>        
        <div>{{ $centre->how_to_get }}</div>
    </div>
    @endif
    
    @if ($centre->add_data)
    <div class="row">
        <h4>Дополнительная информация:</h4>        
        <div>{{ $centre->add_data }}</div>
    </div>
    @endif
    
    @if (count($centre->files) > 0)
    <div class="row">
        <h4>Файлы для скачивания:</h4>
        <div>
            @foreach($centre->files as $file)
            <p><a href="{{ url('files/centres/'.$centre->id.'/'.$file->file_name) }}" target="_blank">{{ $file->title }}</a></p>
            @endforeach     
        </div>
    </div>
    @endif
    
    @if ($centre->vacancies)
    <div class="row">
        <h4>Вакансии:</h4>        
        <div>{{ $centre->vacancies }}</div>
    </div>
    @endif

@if ($centre->latitude and $centre->longtitude)
<script>
    var myMap;

    ymaps.ready(init);

    function init () {
        myMap = new ymaps.Map('map', {
            center: [{{ $centre->latitude }}, {{ $centre->longtitude }}],
            zoom: 11
        });
        
        // Метка-МФЦ
        myGeoObject = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: [{{ $centre->latitude }}, {{ $centre->longtitude }}]
            },
            properties: {
                iconContent: 'МФЦ'
            }
        }, {
            preset: 'islands#blackStretchyIcon'
        });
        
        myMap.geoObjects.add(myGeoObject, {
            balloonContent: '{{ $centre->address }}'
        });
    }    
</script>
@endif

@endsection