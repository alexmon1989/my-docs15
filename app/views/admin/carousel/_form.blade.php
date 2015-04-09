<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($slide) ? $slide->title : '') }}">
            </div>
        </div>
              
        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-2 control-label" for="filename">Изображение</label>
            <div class="col-md-4">
                <input id="filename" name="filename" class="input-file" type="file">
                <p class="help-block">Размер изображения будет изменён до 855px * 400px.</p>
            </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="description">Описание</label>
            <div class="col-md-8">                     
                <textarea class="form-control ckeditor" id="description" name="description">{{ Input::old('short_text', isset($slide) ? $slide->description : '') }}</textarea>
            </div>
        </div>
        
        <!-- Multiple Radios -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="enabled">Включено</label>
            <div class="col-md-4">
                <div class="radio">
                    <label for="enabled-0">
                        <input name="enabled" id="enabled-0" value="1" {{ Input::old('enabled', isset($slide) ? $slide->enabled : '') == 1 ? 'checked="checked"' : '' }} type="radio">
                        Да
                    </label>
                </div>
                <div class="radio">
                    <label for="enabled-1">
                        <input name="enabled" id="enabled-1" value="0" {{ Input::old('enabled', isset($slide) ? $slide->enabled : '') == 0 ? 'checked="checked"' : '' }} type="radio">
                        Нет
                    </label>
                </div>
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
