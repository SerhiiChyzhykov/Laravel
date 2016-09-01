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
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                            <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
                        </div>
                        <div class="content-divider text-muted form-group"><span>Your credentials</span></div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
                            </div>
                            @if ($errors->has('name'))
                            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-feedback">
                                <i class="icon-user-lock text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>
                               {{ $errors->first('password') }}
                           </span>
                           @endif
                       </div>
                       <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback has-feedback-left">
                        <input type="text" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>
                            {{ $errors->first('password_confirmation') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback has-feedback-left">
                        <input type="text" class="form-control" placeholder="Your email" name="email" value="{{ old('email') }}">
                        <div class="form-control-feedback">
                            <i class="icon-mention text-muted"></i>
                        </div>
                        @if($errors->has('email'))
                        <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i>
                         {{ $errors->first('email') }}
                     </span>
                     @endif
                 </div>
                 <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
             </div>
         </form>
     </div>
 </div>
</div>
</div>
</div>
@endsection
