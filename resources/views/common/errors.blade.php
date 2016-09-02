@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert bg-danger alert-styled-left">
  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
  <span class="text-semibold">Oh snap!</span> 
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  <a href="#" class="alert-link">try submitting again</a>.
</div>
@endif

@foreach (Session::all() as $element => $row)
@if ($element === 'Successfully')
<div class="alert bg-success alert-styled-left">
  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
  <span class="text-semibold">Well done!</span>{{$row}}
</div>

@elseif($element === 'Warning')

<div class="alert bg-danger alert-styled-left">
  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
  <span class="text-semibold">Oh snap!</span>  {{$row}}
</div>

@endif

@endforeach
