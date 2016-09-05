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
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <form class="form-horizontal" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">
                                Login to your account <small class="display-block">Enter your credentials below</small>
                            </h5>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-envelop3 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback has-feedback-left">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                        <div class="text-center">
                            <a  href="{{ url('/password/reset') }}">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
