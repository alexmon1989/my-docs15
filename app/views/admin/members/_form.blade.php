<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($member) ? $member->title : '') }}">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">URL*</label>  
            <div class="col-md-6">
                <input id="url" name="url" placeholder="URL" class="form-control input-md" required="" type="text" value="{{ Input::old('url', isset($member) ? $member->url : '') }}">
            </div>
        </div>

        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-2 control-label" for="image">Изображение</label>
            <div class="col-md-4">
                <input id="image" name="image" class="input-file" type="file">
                <p class="help-block">Ширина изображения будет уменьшена до 100 писелей (при необходимости), высота - пропорционально.</p>
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
