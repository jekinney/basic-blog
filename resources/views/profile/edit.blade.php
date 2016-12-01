@extends('layouts.app')

@section('content')
<main class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <section class="well">
                @if(session()->has('profile_updated')) 
                    <div class="alert alert-success">
                        <h5 class="text-center">{{ session()->get('profile_updated') }}</h5>
                    </div>
                @endif
                <form action="{{ route('profile.store', $user) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="label-control">email</label>
                        <input type="email" 
                            name="email" 
                            value="{{ old('email')? old('email'):$user->email }}" 
                            class="form-control"
                        >
                    </div>
                    
                    <div class="row"> 
                        <div class="col-xs-3 col-md-2"> 
                            @if($user->profile)
                                <img src="{{ $user->profile->avatar }}" title="{{ $user->name }}" class="img-responsive">
                            @endif 
                        </div>
                        <div class="form-group col-xs-9 col-md-10">
                            <label class="label-control">Gravatar Email</label>
                            <input type="email" 
                                name="gravatar" 
                                @if(old('gravatar'))
                                    value="old('gravatar')" 
                                @elseif($user->profile)
                                    value="{{ $user->profile->gravatar_email }}"
                                @else 
                                    value="{{ $user->email }}"
                                @endif
                                class="form-control"
                            >
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update Emails</button>
                    </div>

                </form>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <section class="well">
                @if(session()->has('password_updated')) 
                    <div class="alert alert-success">
                        <h5 class="text-center">{{ session()->get('password_updated') }}</h5>
                    </div>
                @endif
                <form action="{{ route('password.update', $user) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="form-group col-md-4 {{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label class="control-label">Current Password</label>
                            <input type="password" 
                                name="current_password" 
                                class="form-control"
                            >
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group col-md-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label">New Password</label>
                            <input type="password" 
                                name="password" 
                                class="form-control"
                            >
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group col-md-4 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label">Confirm New Password</label>
                            <input type="password" 
                                name="password_confirmation" 
                                class="form-control"
                            >
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>

                </form>
            </section>
        </div>
    </div>
</main>
@endsection
