<div class="form-group">
    <select name="{{ $name }}" id="{{$id}}" class="form-control font" {{ isset($req) ? $req : '' }}>
        {{$datas}}
    </select>

    @if ($errors->has($name))
        <span class="help-block">
		<strong>{{ $errors->first($name) }}</strong>
	</span>
    @endif

</div>