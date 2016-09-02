@extends('layouts.app')

@section('content')

<div class="page-header page-header-inverse has-cover">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> Photo</h4>
			<a class="heading-elements-toggle"><i class="icon-more"></i></a>
		</div>
		<!-- COOMING SOON -->
		<div class="heading-elements">
			<form class="heading-form" action="#">
				<div class="form-group">
					<div class="has-feedback">
						<input type="search" class="form-control" placeholder="Search">
						<div class="form-control-feedback">
							<i class="icon-search4 text-size-small text-muted"></i>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- COOMING SOON -->
	</div>
	<div class="breadcrumb-line">
		<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
		<ul class="breadcrumb">
			<li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
			@foreach ($photos as $row)
			<li><a href="/gallery/{{$row->user_id}}"><i class="icon-images3 position-left"></i> Photos</a></li>
			<li class="active"><i class="icon-images2 position-left"></i>{{$row->title}}</li>
			@endforeach
		</ul>
		<ul class="breadcrumb-elements">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-gear position-left"></i>
					Settings
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li class="disabled"><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
					<li class="disabled"><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
					<li class="disabled"><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
					<li class="disabled"></li>
					<li class="disabled"><a href="#"><i class="icon-gear"></i> All settings</a></li>
				</ul>
			</li>
		</ul>
		<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
	</div>
	@include('common.errors')
	<div class="content">
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 ">
			</div>
			@foreach ($photos as $row)
			<?php $photo =  $row->id; ?>
			<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
				<div class="thumbnail">
					<div class ="thumb">
						<img src='../{{$row->images}}' />
						@if ($login == $row->user_id)
						<div class="caption-overflow">
							<span>
							<ul style="list-style-type: none;">
									<li>
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_theme_success" >Eddit</button>
												</li>
									<br>
									<li>
										<form action="{{ url('/photo/'.$row->id) }}" method="POST" >
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-info btn-sm" >
												<i class="fa fa-trash"></i> Remove
											</button>
										</form>
									</li>
								</ul>
							</span>
						</div>
						@endif
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">{{$row->title}}</h3>
						@if ($login == $row->user_id)
						<div id="modal_theme_success" class="modal fade in" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-success">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Eddit</h4>
									</div>
									<form action="{{ url('/photo/'.$row->id.'/edit') }}" method="POST" role="form" enctype="multipart/form-data" name="form">
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
												<input type="hidden" class="form-control" id="files" value="{{$row->images}}" name="images">
												<input type="file" class="form-control" id="file" value="{{$row->images}}" name="image">
												<input type="hidden" class="form-control" id="edit" value="{{$row->id}}" name="edit">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
		</div>
		@endsection