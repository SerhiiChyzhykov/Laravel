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
<div class="alert alert-success alert-styled-left alert-arrow-left alert-component">
  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
  <h6 class="alert-heading text-semibold">Well done!</h6>
  {{$row}}
</div>
@elseif($element === 'Warning')
<div class="alert alert-danger alert-styled-left alert-arrow-left alert-component">
  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
  <h6 class="alert-heading text-semibold">Oh snap!</h6>
  {{$row}}
</div>
@endif

@endforeach
