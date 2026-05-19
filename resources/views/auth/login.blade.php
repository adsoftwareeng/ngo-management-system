@extends('layouts.master_auth')
@section('content')
<div class="account-content mt-4">
    <h3 class="text-center mb-1 mt-4 textDark">Sign In</h3>
    <!-- <p class="mb-2 textDark">Login Account</p> -->
    <form class="form-horizontal" action="{{ route('authenticate') }}" method="post">
                    @csrf

        <div class="form-group row">
            <div class="col-12">
                <label for="emailaddress" class="textDark">Email address</label>
                <input class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" type="email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <!-- <a href="#" class="text-muted float-right"><small class="textDark">Forgot your password?</small></a> -->
                <label for="password" class="textDark">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row text-center mt-2">
            <div class="col-12">
                <button class="btn btn-md btn-block btn-dark waves-effect waves-light" type="submit">
                    Submit
                </button>
                 <!--<a href="{{url('register')}}" class="text-muted float-right mt-3">-->
                 <!--     <small class="textDark">Create an account</small>-->
                 <!-- </a>-->
            </div>
        </div>

    </form>
</div>
    
@endsection