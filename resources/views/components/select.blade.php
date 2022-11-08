<div class="row-input">
    <label>{{ $label }}</label>
    <select name="{{ $name }}" class="form-control" {{$required}} @if($id !='' ) id="{{ $id }}" @endif>
        <option value="">-- {{ __('Select') }} --</option>
        @foreach($values as $value)
        @php
        $id = (gettype($value) === 'array') ? $value['id'] : $value->id;
        $name = (gettype($value) === 'array') ? $value['name'] : $value->name;
        if((gettype($value) === 'object') && $value->question) {
        $name = $value->question;
        }
        $isSelected = ($selected == $id) ? 'selected' : '';
        @endphp
        <option value="{{ $id }}" {{ $isSelected }}>{{ $name }}</option>
        @endforeach
    </select>
</div>