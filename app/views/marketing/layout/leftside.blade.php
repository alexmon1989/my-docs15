<div class="row">
    <div class="logo">
        <a href="{{ url() }}">{{ HTML::image('img/logo.png') }}</a>
    </div>
</div>

@global_service_categories()

<div class="row">
    <div class="col-md-10">
        <div class="infodocs">
            <a href="{{ action('Marketing\DocumentsController@getShow') }}">Информация <br>и документы</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="hours">
            <h4>Часы работы</h4>
            <dl class="dl-horizontal">
                <dt class="text-muted">Пн - Пт</dt>
                <dd class="text-muted">8.00 - 20.00</dd>
                <dt class="text-muted">Сб</dt>
                <dd class="text-muted">8.00 - 16.00</dd>
                <dt class="text-muted">Вс</dt>
                <dd class="text-muted">Выходной</dd>
            </dl>
        </div>
    </div>
</div>