@extends('layouts.master_frontend')
@section('content')  


@include('partials.banner')

	<!-- CONTENT -->
	<div class="section">
		<div class="pt-2 pb-2">
			<div class="container">
				<div class="row">
                    
					<div class="col-sm-12 col-md-12">
					  	<h2 class="section-heading">
					  	    @if($about->type=='president')
					  	      {{$page_title}}
					  	    @else
					  	    
                            {!!split_title($about->title) !!}
					  	    @endif
                        </h2>
					</div>
					<div class="col-sm-5 col-md-5">
						<img src="{{asset('public/uploads/page/'.$about->image)}}" class="aboutImg img-responsive w-100 img-fluid img-border">		
						
                    	<div class="spacer-30"></div>
					</div>

					<div class="col-sm-7 col-md-7">
					      @if($about->type=='president')
					    	<h3>
					    	    <em>  {!! split_title($about->title) !!}</em>
					    	 </h3>
					     @endif
						<p class="text-justify">{!! $about->summary !!}</p>
					
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
                	<div class="row">
	            {!!$about->description!!} 
                    	<div class="spacer-30"></div>
            
				    	
				</div>

			</div>
		</div>
	</div>

<!--  -->

<!--  -->

@endsection