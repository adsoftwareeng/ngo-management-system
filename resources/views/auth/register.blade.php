@extends('layouts.master_auth')
@section('content')

<div class="account-content mt-4">
    <h5 class="text-uppercase mb-1 mt-4 text-center">Register</h5>
    <!-- <p class="mb-0">Get access to our admin panel</p> -->
        <form class="form-horizontal" action="{{ route('store') }}" method="post">
        @csrf  
        <div class="form-group row">
           <div class="col-12">
            <label for="name" class="textDark">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
          <div class="form-group row">
            <div class="col-12">  
              <label for="email" class="textDark">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
          <div class="col-12">
            <label for="password" class="textDark">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
          <div class="form-group row">
            <div class="col-12">
               <label for="password_confirmation" class="textDark">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        <div class="form-group row text-center mt-2">
            <div class="col-12">
                <button class="btn btn-md btn-block btn-dark waves-effect waves-light" type="submit" value="Register">Register Now
                </button>
            </div>
        </div>
        
    </form>
    <div class="row mt-4 pt-2">
        <div class="col-sm-12 text-center">
                <p class="text-dark">Already have an account?  <a href="{{route('login')}}" class="text-dark ml-1"><b>Sign In</b></a></p>
        </div>
    </div>

</div>

@endsection