<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($video) ? $video->title : '') }}">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="youtube_id">ID видео на Youtube*</label>  
            <div class="col-md-6">
                <input id="youtube_id" name="youtube_id" placeholder="ID видео на Youtube" class="form-control input-md" required="" type="text" value="{{ Input::old('youtube_id', isset($video) ? $video->youtube_id : '') }}">
                <p class="help-block">Например, для видео <strong>https://www.youtube.com/watch?v=Ul5NAqmASv</strong>, его ID будет <strong>Ul5NAqmASv</strong></p>
            </div>
        </div>
        
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>

    </fieldset>
</form>
