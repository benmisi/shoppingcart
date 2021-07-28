<div class="{{$size}}">
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    <select id="{{ $name }}"  class="form-control @error($name) is-invalid @enderror" name="{{ $name }}">
        <option></option>
        <option value="ECOCASH">ECOCASH</option>
        <option value="ONEMONEY">ONEMONEY</option>
    </select>
     @error($name)
         
              <p class="text-danger">  {{ $message }}</p>
         
     @enderror
    
</div>
</div>