<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="{{ url() . '/' }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Главная') / МФЦ Мои Документы</title>
    
    <link rel="icon" type="image/ico" href="{{ url('img/favicon.ico') }}" />
    
    @yield('head_scripts', '')
    
    
    <!-- Bootstrap -->
    {{ HTML::style('css/frontend.min.css') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">     
        <div class="col-sm-3 col-md-3">
            
            @include('marketing.layout.leftside')
            
        </div>

        <div class="col-sm-9 col-md-9">
            <div class="row">
                <nav class="navbar navbar-inverse">
                    <div class="col-md-12">
                        <div class="navbar-header centre-choosing">
                            
                            @centreChoosing()
                            
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ action('Marketing\QueueController@getShow') }}">Запись на приём</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>

            <div class="row">
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="http://gosuslugi.ru" target="_blank">Электронные услуги</a></li>
                    <li role="presentation" @if (Request::segment(1) == 'press') class="active" @endif><a href="{{ action('Marketing\PressController@getShow') }}">СМИ о нас</a></li>
                    <li role="presentation" @if (Request::segment(1) == 'members') class="active" @endif><a href="{{ action('Marketing\MembersController@getShow') }}">Участники МФЦ</a></li>
                    <li role="presentation" @if (Request::segment(1) == 'centre') class="active" @endif><a href="{{ action('Marketing\CentreController@getShow') }}">О центре</a></li>
                    <li role="presentation" @if (Request::segment(1) == 'news') class="active" @endif><a href="{{ action('Marketing\NewsController@getIndex') }}">Новости</a></li>
                </ul>
            </div>

            @centreInfo()

            @yield('content', 'Содержимое страницы')

            @include('marketing.layout.footer')
        </div>
    </div><!-- /.container -->

    
    {{ HTML::script('js/frontend.min.js') }}
    
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
        (function(){ var widget_id = '7CzZ9dvyO0';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();
    </script>
    <!-- {/literal} END JIVOSITE CODE -->
    
    <script src="//localhost:35729/livereload.js"></script>
</body>
</html>