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
    .txtColor{
        color:#FF7000 !important;
    }
</style>
<!-- main-area -->

	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<!-- Item 1 -->
				@if(!empty($blogs) && count($blogs)>0)
                  @foreach($blogs as $enq)
					<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising">
		              		<div class="media">
		              		    <div class="meta-date">
									<div class="date">{{date('d',strtotime($enq->created_at))}}</div>
									<div class="month">{{date('M , y',strtotime($enq->created_at))}}</div>
								</div>
		              		     <img src="{{asset('public/uploads/blogs/'.$enq->image)}}" alt="{{$enq->title}}" class="img-responsive eventImg">
		              		</div>
		              		<div class="body-content">
		              		    <p class="title">
		              			    <a href="{{url('our-blogs/'.$enq->slug)}}" class="txtColor text-capitalize">
		              			        <marquee>
		              			        {{$enq->title}}
		              			        </marquee>
		              			    </a>
		              			</p>
		              		
		              		    <div class="text text-justify">{!! substr(strip_tags($enq->description),0,138) !!}..</div>
		              			<a href="{{url('our-blogs/'.$enq->slug)}}" class="btn btn-primary pull-center text-center mt-3">READ MORE</a>
		              		</div>
			            </div>
			        </div>
			        <!-- Item 3 -->
                  @endforeach
                  @else
                	<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising p-5 bg-info">
		              		<div class="body-content">
		              		    <p class="title">
		              			    <a href="#" class="txtColor text-capitalize">
		              			        No Blogs 
		              			    </a>
		              			</p>
		              		
		              		</div>
			            </div>
			        </div>
                @endif
				</div>

			</div>
		</div>
	</div>


@endsection