<div class="row">
    <div class="content centre-info">
        <h2 class="title">{{{ $centre->title }}}</h2>
        <span class="help-block">Горячая линия <span class="hotline">{{ $centre->hot_line }}</span> | <a href="{{ action('Marketing\CentreController@getShow') }}">Как добраться</a></span>
    </div>
</div>