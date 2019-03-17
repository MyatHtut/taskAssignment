<div class="form-group">
    <input type="{{ isset($type) ? $type : 'text' }}" class="form-control" name="{{ $name }}"
           id="{{ $name }}" placeholder="{{ $placeholder }}"
           value="{{ isset($value) ? $value : old($name) }}" {{ isset($req) ? $req : '' }}>

    @if ($errors->has($name))
        <span class="help-block">
		<strong>{{ $errors->first($name) }}</strong>
	</span>
    @endif

</div>