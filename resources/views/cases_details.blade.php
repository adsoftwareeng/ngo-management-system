@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')

<style>
    .eventImg{
        width:100% !important;
        height:300px !important;
        object-fit:contain;
    }
    .box-fundraising{
       background-color:#F8F8F8 !important;    
    }
    .text{
        color:#816f6f;
    }
    .scrollDiv{
         overflow-x:scroll;
         /*text-overflow: ellipsis;*/
         white-space: nowrap;
         width: 100%; /* Adjust as needed */
    }
    .scrollDiv::-webkit-scrollbar {
        width:5px;
        height:2px;
        background-color:#FF7000;
    }
    
    .scrollDiv2{
         overflow-x:scroll;
         /*text-overflow: ellipsis;*/
         white-space: nowrap;
         width: 100%; /* Adjust as needed */
    }
    .scrollDiv2::-webkit-scrollbar {
        width:5px;
        height:0px;
        /*background-color:#FF7000;*/
    }
    label{
        color:#816f6f;
    }
    .textHeading{
        color:#FF7000;
    }
    
   

</style>


<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
             	<div class="row mb-2">
                    <div class="col-md-12">
                        	<img src="{{asset('public/uploads/cases/'.$cases->image)}}" alt="" class="img-fluid eventImg">
                
                        
                        	<h2 class="color-primary mb-3">
                        	    {{$cases->title}}
                        	    </h2>

				    	<a href="{{asset('public/uploads/cases/'.$cases->beneficiary_form)}}" class="btn btn-primary" target="_blank">
	              			   Beneficiary Form
	              			</a>
	              			@if($cases->type=='current')
	              			<a href="{{$cases->donation_url}}" class="btn btn-info text-white" target="_blank">
	              			    Donate Now <i class="fa fa-heart" aria-hidden="true"></i>
	              			</a>
	              			@else
              				<a href="{{asset('public/uploads/cases/'.$cases->discharge_summny)}}" class="btn btn-info text-white" target="_blank">
              			          Discharge Summary
              			</a>
	              			@endif
                        
						
					
					
	              	@if(!empty($cases->video_url))	
	              	
					<div class="spacer-30"></div>
	              	    <div class="embed-responsive embed-responsive-16by9 mb-3">
                          <iframe class="embed-responsive-item" src="{{$cases->video_url}}?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        
                    @endif
					<div class="spacer-30"></div>
					     {!!$cases->description!!}
				
                
				</div>
				
			</div>
		</div>
	</div>
	</div>
	
	
	@include('partials.testimonials')
	

<!---->

@endsection