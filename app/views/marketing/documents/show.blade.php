@extends('marketing.master')

@section('title')
Информация и документы
@endsection

@section('content')
    
<div class="row">

    <h3>Информация и документы</h3>

    <div class="row">
        <div class="col-md-12">
            <a id="show-docs" href="{{ url('documents#') }}">Документы <span>(нажмите для отображения)</span></a>
        </div>
    </div>
    
    <div class="row" id="docs" style="display: none">
        <div class="col-md-12">
            @foreach ($documents_categories as $document_category)
                <h5>{{ $document_category->title }}</h5>
                
                @for ($i = 0; $i < $document_category->documents->count(); $i+=2)
                    <div class="row">
                        <div class="col-md-6">
                            @if (isset($document_category->documents[$i]))      
                            <a href="{{ url('files/documents/'.$document_category->documents[$i]->file) }}">
                                <span class="glyphicon glyphicon-file"></span> 
                                {{ $document_category->documents[$i]->title }}
                                <span class="document-info">
                                    (
                                    {{ '.'.pathinfo($document_category->documents[$i]->file, PATHINFO_EXTENSION) }},
                                    {{ number_format($document_category->documents[$i]->size, 2) }} Кб
                                    )
                                    {{ date('d.m.Y', strtotime($document_category->documents[$i]->created_at)) }}
                                </span>
                            </a>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if (isset($document_category->documents[$i+1]))      
                            <a href="{{ url('files/documents/'.$document_category->documents[$i+1]->file) }}">
                                <span class="glyphicon glyphicon-file"></span> 
                                {{ $document_category->documents[$i+1]->title }}
                                <span class="document-info">
                                    (
                                    {{ '.'.pathinfo($document_category->documents[$i+1]->file, PATHINFO_EXTENSION) }},
                                    {{ number_format($document_category->documents[$i+1]->size, 2) }} Кб
                                    )
                                    {{ date('d.m.Y', strtotime($document_category->documents[$i+1]->created_at)) }}
                                </span>
                            </a>
                            @endif
                        </div>
                    </div>
                @endfor
            @endforeach
        </div>        
    </div>
    
    <a id="show-videos" href="{{ url('documents#') }}">Видео <span>(нажмите для отображения)</span></a>
    
    <div class="row" id="videos" style="display: none">
        <div class="col-md-12">
            @foreach ($videos as $video)
                <h5>{{ $video->title }}</h5>
                
                <iframe width="420" height="315" src="https://www.youtube.com/embed/{{ $video->youtube_id }}" frameborder="0" allowfullscreen></iframe>
            @endforeach
        </div>        
    </div>
</div>

@endsection