<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">ФИО</label>  
            <div class="col-md-6">
                <input id="title" name="username" placeholder="ФИО" class="form-control input-md" type="text" value="{{ Input::old('username', '') }}">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">E-Mail</label>  
            <div class="col-md-6">
                <input id="title" name="email" placeholder="E-Mail" class="form-control input-md" type="text" value="{{ Input::old('email', '') }}">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Текст с картинки</label>  
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        {{ HTML::image(Captcha::img(), 'Captcha image') }}
                    </div>
                    <div class="col-md-8">
                        <input id="captcha" name="captcha" placeholder="Текст с картинки" class="form-control input-md" type="text" required="">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="full_text">Текст жалобы</label>
            <div class="col-md-8">                     
                <textarea class="form-control ckeditor" id="full_text" name="full_text" required="">{{ Input::old('full_text', '') }}</textarea>
            </div>
        </div>
        
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>

    </fieldset>
</form>