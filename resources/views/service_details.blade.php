@extends('layouts.master_frontend')
@section('content')  

	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">Project Detail</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
				    <li class="breadcrumb-item"><a href="{{route('services')}}">Projects</a></li>
                
				    <li class="breadcrumb-item active" aria-current="page">Project Detail</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>
	<!-- CONTENT -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
				
					<div class="col-sm-12 col-md-12">
						<div class="single-news">
                          <h2 class="section-heading">
							 <span> {{$services->title}}</span>
						  </h2>
						
							
							{!! $services->description!!}
							<div class="margin-bottom-50"></div>
						</div>
                       <a href="{{route('services')}}"><i class="fa fa-arrow-left"></i> Back to Project Page</a>
			         </div>
                    
        		</div>
			</div>
		</div>
	</div>	

     
@endsection