<form class="form-horizontal" method="post">
    <fieldset>
        <div class="row">
            <div class="col-md-8">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="title">Название*</label>  
                    <div class="col-md-10">
                        <input id="title" name="title" placeholder="Название" class="form-control input-md" required="" type="text" value="{{ Input::old('title', isset($centre) ? $centre->title : '') }}">
                    </div>
                </div>

                <!-- Text input--> 
                <div class="form-group">
                    <label class="col-md-2 control-label" for="hot_line">Горячая линия</label>
                    <div class="col-md-10">
                        <input id="hot_line" name="hot_line" placeholder="Горячая линия" class="form-control input-md" type="text" value="{{ Input::old('hot_line', isset($centre) ? $centre->title : '') }}">
                    </div>
                </div>

                <!-- Text input--> 
                <div class="form-group">
                    <label class="col-md-2 control-label" for="address">Адрес*</label>
                    <div class="col-md-10">
                        <input id="address" name="address" placeholder="Горячая линия" class="form-control input-md" required="" type="text" value="{{ Input::old('address', isset($centre) ? $centre->address : '') }}">
                    </div>
                </div>

                <!-- Text input--> 
                <div class="form-group">
                    <label class="col-md-2 control-label" for="call_centre">Call-центр</label>
                    <div class="col-md-10">
                        <input id="call_centre" name="call_centre" placeholder="Call-центр" class="form-control input-md" type="text" value="{{ Input::old('call_centre', isset($centre) ? $centre->call_centre : '') }}">
                    </div>
                </div>

                <!-- Text input--> 
                <div class="form-group">
                    <label class="col-md-2 control-label" for="email">E-Mail</label>
                    <div class="col-md-10">
                        <input id="email" name="email" placeholder="E-Mail" class="form-control input-md" type="text" value="{{ Input::old('email', isset($centre) ? $centre->email : '') }}">
                    </div>
                </div>

                <!-- Text input--> 
                <div class="form-group">
                    <label class="col-md-2 control-label" for="director">Директор</label>
                    <div class="col-md-10">
                        <input id="director" name="director" placeholder="Директор" class="form-control input-md" type="text" value="{{ Input::old('director', isset($centre) ? $centre->director : '') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label" for="longtitude">Дополнительные данные</label>
                    <div class="col-md-10">
                        <textarea class="form-control ckeditor" id="add_data" name="add_data">{{ Input::old('add_data', isset($centre) ? $centre->add_data : '') }}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label" for="longtitude">Как добраться</label>
                    <div class="col-md-10">
                        <textarea class="form-control ckeditor" id="how_to_get" name="how_to_get">{{ Input::old('how_to_get', isset($centre) ? $centre->how_to_get : '') }}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label" for="vacancies">Вакансии</label>
                    <div class="col-md-10">
                        <textarea class="form-control ckeditor" id="vacancies" name="vacancies">{{ Input::old('vacancies', isset($centre) ? $centre->vacancies : '') }}</textarea>
                    </div>
                </div>                
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
                
            </div>
            
            <div class="col-md-4">
                
                @include('admin.centres.map')
                
                <div class="form-group">
                    <label class="col-md-2 control-label" for="latitude">Широта</label>
                    <div class="col-md-10">
                        <input id="latitude" name="latitude" placeholder="Широта" class="form-control input-md" type="text" value="{{ Input::old('latitude', isset($centre) ? number_format($centre->latitude, 4) : '') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label" for="longtitude">Долгота</label>
                    <div class="col-md-10">
                        <input id="longtitude" name="longtitude" placeholder="Долгота" class="form-control input-md" type="text" value="{{ Input::old('longtitude', isset($centre) ? number_format($centre->longtitude, 4) : '') }}">
                    </div>
                </div>
            </div>
        
        </div>

        

    </fieldset>
</form>
