<div class="form-group">
    <label for="{{ $name }}"><strong>{{ ucfirst($name) }}</strong></label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}" step="any" {{ $modifier }}>
</div>
