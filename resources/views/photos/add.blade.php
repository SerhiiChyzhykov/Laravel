@extends('layouts.app')
@section('content')
<div class="page-header page-header-inverse has-cover">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> Home</h4>
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
            <li class="active"><i class="icon-home2 position-left"></i> Home</li>
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
    </div>
</div>
@include('common.errors')
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <form class="form-horizontal" action="{{ url('/adds') }}" method="POST" role="form" enctype="multipart/form-data" name="form">
                    {{ csrf_field() }}
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-primary text-primary"><i class="icon-image4"></i></div>
                            <h5 class="content-group">
                                New Photo <small class="display-block">Enter your credentials below</small>
                            </h5>
                        </div>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
                            <div class="form-control-feedback">
                                <i class="icon-typography text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description">
                            <div class="form-control-feedback">
                                <i class="icon-profile text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="categories" class="form-control bg-primary">
                                <?php $i = 1;?>
                                @foreach($categories as $row ) 
                                @if($i == 1)
                                <option value="{{ $row->id }}" selected="selected">{{$row->title}}</option>
                                @else
                                <option value="{{ $row->id }}">{{$row->title}}</option>
                                @endif
                                <?php $i++;?>
                                @endforeach
                            </select>
                            <span class="label label-block label-primary">Category</span>
                        </div>
                        <div class="form-group">
                            <div class="uploader">
                                <input type="file" class="file-styled-primary" name="image">
                                <span class="filename" style="-webkit-user-select: none;">No file selected</span>
                                <span class="action btn bg-blue" style="-webkit-user-select: none;">Choose File</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">New Photo <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection