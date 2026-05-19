@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card-box border border-1">
           <div class="container mt-5">
               <div class="your_application_box text-center pull-center">
                    <h2 class="text-center mb-4 text-success"><i class="fa fa-check text-primary h2" aria-hidden="true" id="crose_icon"></i> Congratulations 1st Step Completed!</h2>
                    <h3 class="text-center mb-4">Now Apply For Membership.</h3>
                      @if($users->status==2)
                       <a href="#" class="btn btn-lg btn-success mb-4 w-50">Request has been sent. Please Wait for acception.</a>
                      @elseif($users->status==1)
                        <a href="{{route('user.dashboard')}}" class="btn btn-lg btn-success mb-4 w-50">Go to Dashboard.</a>
                    @else
                       <a href="{{route('user.membershipform')}}" class="btn btn-lg btn-success mb-4 w-50">Apply  Now</a>
                   @endif
               </div>
           </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection