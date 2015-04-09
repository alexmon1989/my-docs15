<h4>Фотографии</h4>

<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('admin/centres/add-photo/'.$centre->id) }}">
            <div class="form-group">
                <label class="col-md-1 control-label" for="filebutton">Добавить</label>
                <div class="col-md-3">
                    <input id="file_name" name="file_name" class="input-file" type="file">
                    <p class="help-block">Будет преобразовано к размеру 855px * 400px</p>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </div>
        </form>
        <br><br>
    </div>
</div>

<table id="images" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="15%">Изображение</th>
            <th>Порядок</th>
            <th width="25%">Дата создания</th>
            <th width="5%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($centre->photos as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td><img src="{{ url( 'img/centres/'.$item->file_name ) }}" alt="Фото" height="150"></td>
            <td>
                {{ $item->order }}
                &nbsp;
                @if ($item->order != $min_order_photo)
                <a href="{{ action('Admin\CentresController@getDecreasePicOrder', array('id' => $item->id)) }}" title="Поднять"><i class="fa fa-arrow-up fa-fw"></i></a>&nbsp;
                @endif
                @if ($item->order != $max_order_photo)
                <a href="{{ action('Admin\CentresController@getIncreasePicOrder', array('id' => $item->id)) }}" title="Опустить"><i class="fa fa-arrow-down fa-fw"></i></a>
                @endif
            </td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}</td>
            <td>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\CentresController@getDeletePic', array('id' => $item->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>