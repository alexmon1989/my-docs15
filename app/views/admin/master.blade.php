<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url() . '/' }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>МФЦ "Мои документы" - Администрирование</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('assets/packages/bootstrap/dist/css/bootstrap.min.css') }}

    <!-- MetisMenu CSS -->
    {{ HTML::style('assets/packages/metisMenu/dist/metisMenu.min.css') }}

    <!-- DataTables CSS -->
    {{ HTML::style('assets/packages/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}

    <!-- DataTables Responsive CSS -->
    {{ HTML::style('assets/packages/datatables-responsive/css/dataTables.responsive.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('assets/packages/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('assets/packages/font-awesome/css/font-awesome.min.css') }}
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    @yield('head_scripts', '') 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">МФЦ "Мои документы" - Администрирование</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">  
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a target="_blank" href="{{ url() }}"><i class="fa fa-home fa-fw"></i> На сайт</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{ action('Admin\AuthController@getLogout') }}"><i class="fa fa-sign-out fa-fw"></i> Выход</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ action('Admin\DashboardController@getShow') }}"><i class="fa fa-dashboard fa-fw"></i> Начало работы</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list fa-fw"></i> Новости<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\NewsController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\NewsController@getIndex') }}"><i class="fa fa-list fa-fw"></i> Список новостей</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Услуги<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\GlobalServiceCategoriesController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\GlobalServiceCategoriesController@getIndex') }}"><i class="fa fa-sitemap fa-fw"></i> Список услуг</a>    
                                </li>
                                <li>
                                    <a href="{{ action('Admin\OrganizationsController@getIndex') }}"><i class="fa fa-list fa-fw"></i> Список ведомств</a>    
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ action('Admin\PressController@getIndex') }}"><i class="fa fa-newspaper-o fa-fw"></i> Пресса о нас</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building fa-fw"></i> Центры и их данные<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\CentresController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\CentresController@getIndex') }}"><i class="fa fa-building fa-fw"></i> Список центров</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>        
                                               
                        <li>
                            <a href="#"><i class="fa fa-th-list fa-fw"></i> Участники МФЦ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\MembersController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\MembersController@getIndex') }}"><i class="fa fa-th-list fa-fw"></i> Список участников</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
                        
                        <li>
                            <a href="#"><i class="fa fa-external-link fa-fw"></i> Полезные ссылки<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\LinksController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\LinksController@getIndex') }}"><i class="fa fa-external-link fa-fw"></i> Список ссылок</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
                        
                        <li>
                            <a href="#"><i class="fa fa-sliders fa-fw"></i> Слайдер<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\CarouselController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\CarouselController@getIndex') }}"><i class="fa fa-list fa-fw"></i> Список слайдов</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Информация и документы<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa  fa-list fa-fw"></i> Категории документов <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ action('Admin\DocumentCategoriesController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('Admin\DocumentCategoriesController@getIndex') }}"><i class="fa fa-list fa-fw"></i> Список категорий</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Документы <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ action('Admin\DocumentsController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('Admin\DocumentsController@getIndex') }}"><i class="fa fa-list fa-fw"></i> Список документов</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-file-video-o fa-fw"></i> Видео <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ action('Admin\VideosController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('Admin\VideosController@getIndex') }}"><i class="fa fa-list fa-fw"></i> Список видео</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Администраторы<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ action('Admin\UsersController@getCreate') }}"><i class="fa fa-plus-square fa-fw"></i> Добавить</a>
                                </li>
                                <li>
                                    <a href="{{ action('Admin\UsersController@getIndex') }}"><i class="fa fa-users fa-fw"></i> Список администраторов</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('title', 'МФЦ "Мои документы" - Администрирование')</h1>
                        
                        @yield('content', 'Содержимое страницы')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{ HTML::script('assets/packages/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('assets/packages/bootstrap/dist/js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('assets/packages/metisMenu/dist/metisMenu.min.js') }}

    <!-- DataTables JavaScript -->
    {{ HTML::script('assets/packages/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/packages/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('assets/packages/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js') }}

    @yield('scripts', '')    
</body>

</html>
