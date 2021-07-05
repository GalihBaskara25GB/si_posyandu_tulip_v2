@php
  $alertType = 'danger';
  if (Session::get('success')) {
    $message = Session::get('success');
    $alertType = 'success'; 
  } 
@endphp
<div class="row col-12 purchace-popup">
  <div class="alert alert-{{$alertType}} alert-dismissible fade show col-12 grid-margin" role="alert">
    @if(session('errors'))
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @else
      <strong>Info!</strong><br/> {{ $message }}.
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>