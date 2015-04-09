<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название*</label>  
            <div class="col-md-6">
                <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($document) ? $document->title : '') }}">
            </div>
        </div>
        
        <!-- Select-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="document_category_id">Категория*</label>  
            <div class="col-md-6">
                <select id="document_category_id" name="document_category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{{ $category->id }}}" {{ (Input::old('document_category_id', isset($document) ? $document->document_category_id : '') == $category->id) ? 'selected="selected"' : "" }}>{{{ $category->title }}}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-2 control-label" for="file">Файл</label>
            <div class="col-md-4">
                <input id="file" name="file" class="input-file" type="file">
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
