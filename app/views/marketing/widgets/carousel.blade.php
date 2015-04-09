<div class="row">
    <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">            
            @for ($i = 0; $i < $slides->count(); $i++)
            <li data-target="#carousel-example-captions" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
            @endfor
        </ol>
        <div class="carousel-inner" role="listbox">
            @for ($i = 0; $i < $slides->count(); $i++)
                <div class="item {{ $i == 0 ? 'active' : '' }}">
                    <img src="{{ url( Config::get('carousel.imgs_url').'/'.$slides[$i]->filename ) }}" alt="{{ $slides[$i]->title }}">
                    <div class="carousel-caption">
                        <h3>{{ $slides[$i]->title }}</h3>
                        <p>{{ $slides[$i]->description }}</p>
                    </div>
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