<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($service) ? $service->title : '') }}">
            </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="full_text">Полный текст*</label>
            <div class="col-md-8">                     
                <textarea class="form-control ckeditor" id="full_text" name="full_text">{{ Input::old('full_text', isset($service) ? $service->full_text : '') }}</textarea>
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Примечание</label>  
            <div class="col-md-6">
                <input id="note" name="note" placeholder="Примечание" class="form-control input-md" type="text" value="{{ Input::old('note', isset($service) ? $service->note : '') }}">
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-1 control-label"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>

    </fieldset>
</form>
