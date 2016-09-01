@extends('layouts.app')

@section('content')
<style type="text/css" media="screen">
    .form-horizontal .form-group {
        margin-left: 0px;
        margin-right: 0px;
    }
</style>
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
