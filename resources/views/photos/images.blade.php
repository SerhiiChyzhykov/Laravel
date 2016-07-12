@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-xs-1 col-sm-1 col-md-1 ">
	</div>
	@foreach ($photos as $row)

	<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
		<div class="thumbnail">
			<img src='../{{$row->images}}' width="600" hight="600" />
		</div>
		@if ($row->user_id == Auth::user()->id)
		<form action="" method="POST" role="form" name="delete">
			<input type="hidden" name="delete" value="{{$photo = $row->id}}">
			<button type="submit" class="btn btn-primary" style="float: right; margin-left: 5px;">Delete</button>
		</form>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" style="float: right; margin-left: 5px;">Eddit</button>
		<div class="modal fade" id="edit" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Eddit</h4>
					</div>
					<form action="" method="POST" role="form" enctype="multipart/form-data" name="form">
						<div class="modal-body">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control" id="title" name="title" value="{{$row->title}}" required="required">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" class="form-control" id="description" value="{{$row->description}}" name="description" required="required">
							</div>
							<div class="form-group">
								<label for="">Category</label>
								<select  name="categories" id="input" class="form-control" required="required">
									@foreach ($category as $item)
									<option @if($item->id == $row->category_id) selected @endif value="{{ $item->id }}">{{$item->title}}</option>
									@endforeach 
								</select>
							</div>
							<div class="form-group">
								<center><img src='../{{$row->images}}' width="150" hight="150" /></center>
								<br>
								<input type="file" class="form-control" id="file" value="{{$row->images}}" name="image">
								<input type="hidden" class="form-control" id="edit" value="{{$row->id}}" name="edit">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endif
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">{{$row->title}}</h3>
			</div>
			<div class="panel-body">
				{{$row->description}}
			</div>
		</div>
	</div>
	@endforeach
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">Comment form</h3>
			</div>
			<div class="panel-body">
				<form action="{{ url('messages') }}" method="POST" role="form" name="form">
					<div class="form-group">
						<label for="">Message:</label>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="photo" value="{{ $photo }}">
						<input type="text" name="post" class="form-control" id="" required="required">
					</div>
					<button type="submit" name="send" class="btn btn-primary">Send</button>
				</form>
			</div>
		</div>
		<div class="panel-group" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Last comments</h3>
				</div>
				<div class="panel-body">
					@foreach ($messages as $row)
					<p>
						<?php
						$rand = array('default','success','info','warning','danger'); 
						$rand = $rand[rand(0,4)];  
						?>
						<span class="label label-{{$rand}} text-capitalize">{{ $row->username }}</span>
						<div class="world">{{ $row->post }}</p><br/>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection