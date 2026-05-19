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
		                		<img src="{{asset('public/uploads/initiative/'.$enq->image)}}" alt="" class="img-responsive img-fluid eventImg">
		              		</div>
		              		<div class="body-content">
		              			<!--<p class="title scrollDiv"><a href="{{url('initiative-detail/'.$enq->slug)}}">{{$enq->name}}</a></p>-->
		              				<p class="title mb-0">
		              				    <a href="{{url('initiative-detail/'.$enq->slug)}}">
		              				        <marquee>{{$enq->name}}</marquee>
		              				    </a>
		              				</p>
		              			
		              			<div class="text text-justify initiveDecLength">{{ substr($enq->description,0,100)}}...</div>
		              			<div class="progress-fundraising pull-center text-center">
			              		    <a href="{{url('initiative-detail/'.$enq->slug)}}" class="btn btn-primary">READ MORE</a>
			              		</div>
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