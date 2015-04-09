<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($press) ? $press->title : '') }}">
            </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="full_text">Полный текст</label>
            <div class="col-md-8">                     
                <textarea class="form-control ckeditor" id="full_text" name="full_text" required="">{{ Input::old('full_text', isset($press) ? $press->full_text : '') }}</textarea>
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
