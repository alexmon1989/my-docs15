@extends('marketing.master')

@section('title')
Новости
@endsection

@section('content')

    <div class="row">
        <h3>Новости</h3>
        
        @for ($i = 0; $i < $news->count(); $i += 3)
            @if (isset($news[$i]))
                <div class="row news-row">

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <small class="text-muted">{{ date('d.m.Y', strtotime($news[$i]->created_at)) }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ action('Marketing\NewsController@getShow', array('id' => $news[$i]->id)) }}">{{ $news[$i]->title }}</a>
                            </div>
                        </div>
                        @if ($news[$i]->image)
                            <div class="row">
                                <div class="col-md-12">
                                    {{ HTML::image('img/articles/'.$news[$i]->image, $news[$i]->title, array('class' => 'preview-img img-thumbnail')) }}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $news[$i]->short_text }}</p>
                            </div>
                        </div>
                    </div>

                    @if (isset($news[$i+1]))
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <small class="text-muted">{{ date('d.m.Y', strtotime($news[$i+1]->created_at)) }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ action('Marketing\NewsController@getShow', array('id' => $news[$i+1]->id)) }}">{{ $news[$i+1]->title }}</a>
                            </div>
                        </div>
                        @if ($news[$i+1]->image)
                            <div class="row">
                                <div class="col-md-12">
                                    {{ HTML::image('img/articles/'.$news[$i+1]->image, $news[$i+1]->title, array('class' => 'preview-img img-thumbnail')) }}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $news[$i+1]->short_text }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (isset($news[$i+2]))
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <small class="text-muted">{{ date('d.m.Y', strtotime($news[$i+2]->created_at)) }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ action('Marketing\NewsController@getShow', array('id' => $news[$i+2]->id)) }}">{{ $news[$i+2]->title }}</a>
                            </div>
                        </div>
                        @if ($news[$i+2]->image)
                            <div class="row">
                                <div class="col-md-12">
                                    {{ HTML::image('img/articles/'.$news[$i+2]->image, $news[$i+2]->title, array('class' => 'preview-img img-thumbnail')) }}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $news[$i+2]->short_text }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            @endif
        @endfor
        
        <div class="text-center">{{ $news->links() }}</div>
    </div>
@endsection