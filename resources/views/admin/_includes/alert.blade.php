@if(session()->has('danger') || session()->has('success'))

<div class="alert alert-{{ session('danger') ? 'danger ' : 'success ' }} alert-dismissible fade show" role="alert">
  {{ session('danger') ?: session('success') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif