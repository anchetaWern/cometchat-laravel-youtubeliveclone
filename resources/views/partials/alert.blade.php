@if (session('alert'))
<div class="alert alert-{{ session('alert.type') }} alert-dismissible fade show text-left p-3" role="alert">
  {{ session('alert.text') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
