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
    .txtColor{
        color:#FF7000;
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

					<div class="col-sm-8 col-md-8">

						<div class="img-date">
							<div class="meta-date">
								<div class="date">{{date('d',strtotime($events->created_at))}}</div>
								<div class="month">{{date('m,Y',strtotime($events->created_at))}}</div>
							</div>
    	    				
    	    				@if($events->type=='image')
                  			   <img src="{{asset('public/uploads/activity/'.$events->image)}}" alt="" class="img-responsive eventImg">
                  			@else
                  			    <iframe class="embed-responsive-item" src="{{$events->image}}" style="height:280px; width:100%"></iframe>
                            @endif
						</div>

						<div class="spacer-10"></div>

						<h2 class="color-secondary">{{$events->name}}</h2>
                         @if(!empty($events->city) && !empty($events->location))
						<div class="meta">
						    @if(!empty($events->city))
							<span class="location"><i class="fa fa-map-marker"></i> {{ $events->city}}</span>
							@endif
							
						    @if(!empty($events->location))
							<span class="location"><i class="fa fa-map-marker"></i> {{ $events->location}}</span>
							@endif
						</div>
                      	<div class="spacer-30"></div>
                         @endif
						<p class="uk18 color-secondary text-justify">{{$events->description}}</p>
						

					</div>
					@if(!empty($other_activity) && count($other_activity)>0)
                   	<div class="col-sm-4 col-md-4">
							
								<h3 class=" text-dark">Other Activity</h3>
							    <ul>
							        @foreach($other_activity as $enq)
            							<li class="txtColor"><a href="{{url('activity-detail/'.$enq->slug)}}" class="text-dark">  {{$enq->name}}</a></li>
            						@endforeach
        						</ul>
                    </div>
                    @endif
					
				</div>
			</div>
		</div>
	</div>
	
<!---->


	

@endsection