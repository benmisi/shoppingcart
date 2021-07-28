<div class="{{$size}}">
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    <textarea id="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}">{{$value}}</textarea>
     @error($name)
         
              <p class="text-danger">  {{ $message }}</p>
         
     @enderror
    
</div>
</div>