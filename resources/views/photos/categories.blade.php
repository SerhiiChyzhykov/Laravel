@extends('layouts.app')

@section('content')
@for ($i = 1; $i <= 4; $i++)

@foreach ($cat as $row)
<?php 
$rand = array('success', 'info','warning', 'danger' );
$rand = $rand[rand(0,3)];
?>
<?php $r = rand(1,$cat_id);?>
@if ($row->id == $r)
<div class="panel panel-{{$rand}}">
	<div class="panel-heading">
		<a href="/category/{{$row->id}}" class="color">
			<h3 class="panel-title">
				Category {{$row->title}}
			</h3>
		</a>
	</div>
	<div class="panel-body">
	@foreach ($photos as $key)
		@if ($row->id == $key->category_id)
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
			<div class="thumbnail">
				<a href ="/photo/{{$key->id}}"><img src='{{$key->images}}' width="300" hight="300" /></a>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>
@endif
@endforeach
@endfor
@endsection