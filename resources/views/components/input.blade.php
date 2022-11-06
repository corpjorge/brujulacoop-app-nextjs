<div class="row-input">
    <label>{{ $label }}</label>
    <div class="small">{!! $complement !!}</div>
    <input type="{{ $type }}" value="{!! $value !!}" name="{{ $name }}" class="form-control" {{ $readonly }} {{ $required }} @if($accept !='' ) accept="{{ $accept }}" @endif @if($id !='' ) id="{{ $id }}" @endif @if($type=='number' ) step="any" @endif />
</div>