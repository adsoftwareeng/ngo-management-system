@extends('layouts.master_frontend')
@section('content')  


@include('partials.banner')

	<!-- CONTENT -->
	<div class="section">
		<div class="content-wrap mb-0 pb-0">
			<div class="container">
				<div class="row">
                    	<div class="col-sm-6 col-md-6">
						
						<h2 class="section-heading">
                          Mission
                                    
						</h2>

						<p class="text-justify">{{$mission->description}}</p>
						<div class="spacer-30"></div>
						

					</div>
					<div class="col-sm-6 col-md-6">
						<h2 class="section-heading">
                          Vission
                                    
						</h2>

						<p class="text-justify"> {{$mission->summary}}</p>
						<div class="spacer-30"></div>
						

					</div>

				
					

				</div>
            
            
				<div class="row">
				  @if(!empty($about->url))
				  	<div class="col-sm-6 col-md-6">
					  <div class="embed-responsive embed-responsive-16by9 mb-5">
        				  <iframe class="embed-responsive-item" src="{{$about->url}}?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen>
        				     
        				  </iframe>
    				 </div>
    		    	</div>
    		      @endif
    		      
    		      	  @if(!empty($about->url2))
				  	<div class="col-sm-6 col-md-6">
					  <div class="embed-responsive embed-responsive-16by9 mb-5">
        				  <iframe class="embed-responsive-item" src="{{$about->url2}}?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen>
        				  </iframe>
    				 </div>
    		    	</div>
    		      @endif
		    	
                    	<div class="spacer-30"></div>
                </div>

		</div>
	</div>
	
@include('partials.testimonials')
	
                    	<div class="spacer-70"></div>

@endsection