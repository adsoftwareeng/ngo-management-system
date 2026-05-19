@extends('layouts.master_frontend')
@section('content')  
@include('partials.banner')


	<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
                    <!--------- User Detail ---------------->
                    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center p-5">
                    
                    <img src="{{ asset('public/uploads/users/'.$user->image )?? asset('public/uploads/users/user.png') }}" 
                        alt="{{ $user->name }}" 
                        class="rounded-circle mb-4" 
                        style="width: 150px; height: 150px; object-fit: cover;">

                    <h2 class="mb-2">{{ $user->name }}</h2>

                    @if($user->designation)
                        <p class="text-muted mb-4">{{ $user->designation }}</p>
                    @endif

                    <ul class="list-group list-group-flush text-start mb-4">
                        @if($user->email)
                            <li class="list-group-item">
                                <strong>Email:</strong> {{ $user->email }}
                            </li>
                        @endif

                        @if($user->phone)
                            <li class="list-group-item">
                                <strong>Phone:</strong> {{ $user->phone }}
                            </li>
                        @endif

                        @if($user->address)
                            <li class="list-group-item">
                                <strong>Address:</strong> {{ $user->address }}
                            </li>
                        @endif

                        @if($user->bio)
                            <li class="list-group-item">
                                <strong>About:</strong> {{ $user->bio }}
                            </li>
                        @endif
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
                    <!--------- end user details ------------>
				</div>

			</div>
		</div>
	</div>
	
@endsection