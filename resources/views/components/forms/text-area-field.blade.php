@props([
      "className" => "",
     "label" => "",
     "name" => "",
     "placeholder" => ""
])
<div class="{{ $className }}">
    <label for="exampleFormControlTextarea1" class="form-label">{{ $label }}</label>
    <textarea class="form-control" rows="6" name="{{ $name }}" placeholder="{{ $placeholder }}"></textarea>
</div>
