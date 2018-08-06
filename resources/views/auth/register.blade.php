@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3"> </div>

        <div class="col-6 col-md-offset-4">
            <div class="panel panel-default box">
                <div class="panel-heading" style="text-align: center; font-size: 25px">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="margin-top: 3%">
                            <div class="row">
                                <label for="name" class="col-3 control-label">Name</label>

                                <div class="col-9">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-top: 2%">
                            <div class="row">
                                <label for="email" class="col-3 control-label">E-Mail Address</label>

                                <div class="col-9">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 2%">
                            <div class="row">
                                <label for="password" class="col-3 control-label">Password</label>

                                <div class="col-9">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 2%">
                            <div class="row">
                                <label for="password-confirm" class="col-3 control-label">Confirm Password</label>

                                <div class="col-9">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 align-center" style="margin-top: 6%">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
