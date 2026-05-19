@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')
<style>
   .albumImg{
       width:100%;
       height:200px;
   } 
</style>

<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
				  	@if(!empty($gallery) && count($gallery)>0)
                        @foreach($gallery as $key => $enq)
				    <div class="col-sm-6 col-md-4">
						<!-- BOX 1 -->
						<div class="box-news-1">
						    
							<div class="body">
							    <a href="{{url('album/gallery/'.$enq->slug)}}">
								<img src="{{asset('public/uploads/album/'.$enq->image)}}" title="{{$enq->alt}}" class="img-fluid albumImg border boder-round">
								</a>
								<div class="title mt-3"><a href="{{url('album/gallery/'.$enq->slug)}}" title=""> {{$enq->title}} </a></div>
								
							</div>
						</div>
					</div>
	
				@endforeach
				@else 
    			 <div class="col-sm-12 col-md-12">
    					<!-- BOX 1 -->
    					<div class="box-news-1 p-5 bg-info text-white">
    					    <h2>No Album</h2>
    					</div>
    			  </div>
		    	@endif
					

				</div>

			</div>
		</div>
	</div>



@endsection