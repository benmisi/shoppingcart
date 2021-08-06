<div>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal">
<i class="fa fa-pencil"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form method="POST" action="{{ route('Admin-currency.update',$id) }}">
                        @csrf

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update currency</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
                        <div class="row">
                     
                        <div class="col-md-12">
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Name</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$name}}">
     @error('name')
         
              <p class="text-danger">  {{ $message }}</p>
         
     @enderror
    
</div>
</div>
                    </div>
                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>