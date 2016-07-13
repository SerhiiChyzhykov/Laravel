@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <strong>Whoops! Something went wrong!</strong>

   <br><br>

   <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
<div class="container">
@foreach (Session::all() as $element => $row)
@if ($element === 'Successfully')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Well done!</strong> {{$row}}
</div>
@elseif($element === 'Warning')
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> {{$row}}
</div>
@endif

@endforeach
    </div>