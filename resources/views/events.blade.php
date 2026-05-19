@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')
<style>
    .eventImg{
        width:100% !important;
        height:250px !important;
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
</style>

	<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<!-- Item 1 -->
				@if(!empty($events))
                  @foreach($events as $enq)
					<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising">
		              		<div class="media">
		              			<div class="meta-date">
									<div class="date">{{date('d',strtotime($enq->event_date))}}</div>
									<div class="month">{{date('M , Y',strtotime($enq->event_date))}}</div>
								</div>
		                		<img src="{{asset('public/uploads/event/'.$enq->image)}}" alt="" class="img-responsive eventImg">
		              		</div>
		              		<div class="body-content">
		              			<p class="title scrollDiv"><a href="{{url('event-detail/'.$enq->slug)}}">{{$enq->name}}</a></p>
		              			<div class="meta scrollDiv2">
									<!--<span class="date"><i class="fa fa-clock-o"></i>  12:00 am - 5:00 pm</span>-->
									<span class="location "><i class="fa fa-map-marker"></i> {{ $enq->location}}</span>
								</div>
		              			<div class="text text-justify">{{ substr($enq->description,0,200)}}...</div>
		              			<div class="spacer-30"></div>
		              			<a href="{{url('event-detail/'.$enq->slug)}}" class="btn btn-primary">READ MORE</a>
		              		</div>
			            </div>
			        </div>
			        <!-- Item 3 -->
                  @endforeach
              @endif
				</div>

			</div>
		</div>
	</div>
	<!-- OUR GALLERY -->


@endsection