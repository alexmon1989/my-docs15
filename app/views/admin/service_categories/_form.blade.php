<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($service_category) ? $service_category->title : '') }}">
            </div>
        </div>
        
        <!-- Select-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="organization_id">Ведомство*</label>  
            <div class="col-md-6">
                <select id="organization_id" name="organization_id" class="form-control">
                    <option value="">&nbsp;</option>
                    @foreach($organizations as $organization)
                    <option value="{{{ $organization->id }}}" {{ (Input::old('organization_id', isset($service_category) ? $service_category->organization_id : '') == $organization->id) ? 'selected="selected"' : "" }}>{{{ $organization->title }}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-2 control-label" for="image">Изображение</label>
            <div class="col-md-6">
                <input id="image" name="image" class="input-file" type="file">
                <p class="help-block">Изображение автоматически будет ужато до размера 50px * 50px.</p>
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
