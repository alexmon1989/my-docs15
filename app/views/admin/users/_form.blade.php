<form class="form-horizontal" method="post" autocomplete="off">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Логин*</label>  
            <div class="col-md-6">
                <input id="username" name="username" placeholder="Логин" class="form-control input-md" required="" type="text" value="{{ Input::old('username', isset($user) ? $user->username : '') }}">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="email">E-Mail*</label>  
            <div class="col-md-6">
                <input id="email" name="email" placeholder="E-Mail" class="form-control input-md" required="" type="text" value="{{ Input::old('email', isset($user) ? $user->email : '') }}">
            </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Пароль</label>  
            <div class="col-md-6">
                <input id="password" name="password" placeholder="Пароль" class="form-control input-md" type="password">
                <p class="help-block">Необязательно только в режиме редактирования</p>
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
