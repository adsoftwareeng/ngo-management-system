@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')
<style>
    .eventImg{
        width:100% !important;
        height:200px !important;
        objct-fit:contain !important;
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
				@if(!empty($cases) && count($cases)>0)
                  @foreach($cases as $enq)
                  	<div class="col-sm-12 col-md-12">
    			            <div class="box-fundraising">
    		              		<div class="body-content row">
    		              		<div class="col-md-4">
    		              		    <a href="{{url('case-detail/'.$enq->slug)}}">
    		              		    <img src="{{asset('public/uploads/cases/'.$enq->image)}}" alt="" class="img-responsive eventImg">
    		              		    </a>
    		              		</div>
    		              		<div class="col-md-8">
    		              		  	<h3 class="">
    		              			    <a href="{{url('case-detail/'.$enq->slug)}}">
    		              			        {{$enq->title}}
    		              			   </a>
    		              			</h3>
    		              		   <div class="text mb-3">
    		              			   <p class="text-justify">    
    		              			{{ \Illuminate\Support\Str::limit(strip_tags($enq->description), 200) }}
    		              		        </p>

    		              			</div>
    		              			<a href="{{asset('public/uploads/cases/'.$enq->beneficiary_form)}}" class="btn btn-primary" target="_blank">
    		              			   Beneficiary Form
    		              			</a>
    		              			@if($enq->type=='current')
    		              			<a href="{{$enq->donation_url}}" class="btn btn-info text-white" target="_blank">
    		              			    Donate Now <i class="fa fa-heart" aria-hidden="true"></i>
    		              			</a>
    		              			@else
		              				<a href="{{asset('public/uploads/cases/'.$enq->discharge_summny)}}" class="btn btn-info text-white" target="_blank">
		              			          Discharge Summary
		              			</a>
    		              			@endif
    		              		
    		              		</div>
    		              		
    		              		</div>
    			            </div>
    			        </div>
			        <!-- Item 3 -->
                  @endforeach
                @else
                		<div class="col-sm-12 col-md-12">
			            <div class="box-fundraising  ">
		              		<div class="body-content text-center pull-center bg-info text-white p-5">
                                   <h1>
                                        No Cases  in the database
                                    </h1>
		              		
		              		
		              		</div>
			            </div>
			        </div>
                
              @endif
				</div>

			</div>
		</div>
	</div>
	<!-- OUR GALLERY -->


@endsection