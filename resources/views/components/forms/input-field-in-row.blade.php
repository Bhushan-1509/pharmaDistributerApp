@props([
      "className" => "",
     "label" => "",
     "type" => "",
     "name" => "",
     "placeholder" => ""
])
<div class="{{ $className }}">
    <label class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" " value="" name="{{ $name }}" placeholder="{{ $placeholder }}">
</div>
