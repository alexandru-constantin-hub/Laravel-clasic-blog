@if(session()->has('message'))
<div class="sticky-top top-0 alert alert-warning alert-dismissible fade show " role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif