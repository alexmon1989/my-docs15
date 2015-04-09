<h4>Файлы</h4>

<div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('admin/centres/add-file/'.$centre->id) }}">
            <div class="form-group">
                <label class="col-md-1 control-label" for="filebutton">Добавить</label>
                <div class="col-md-3">
                    <input id="file_name" name="file_name" class="input-file" type="file">
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
            <th>Файл</th>
            <th width="25%">Дата создания</th>
            <th width="5%">Действия</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($centre->files as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('files/centres/'.$centre->id.'/'.$item->file_name) }}" target="_blank">{{ $item->title }}</a></td>
            <td>{{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}</td>
            <td>
                <a class="btn btn-danger btn-sm delete" href="{{ action('Admin\CentresController@getDeleteFile', array('id' => $item->id)) }}" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>