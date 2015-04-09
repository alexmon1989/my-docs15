<label>Ваш центр:&nbsp;</label>
<select id="mfc-choosing">
    @foreach ($centres as $centre)
        <option value="{{ $centre->id }}" @if ($centre->id == Session::get('centre_id')) selected="selected" @endif>{{{ $centre->title }}}</option>
    @endforeach
</select>