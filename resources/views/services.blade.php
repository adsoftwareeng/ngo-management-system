@extends('layouts.master_frontend')
@section('content') 


@include('partials.banner')
<!-- CONTENT -->
<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
                @if(!empty($services))
                    @foreach($services as  $enq)
					<div class="col-sm-6 col-md-4">
						<!-- BOX 1 -->
						<div class="box-news-1">
							<div class="media gbr">
                                <img src="{{asset('public/uploads/service/'.$enq->image)}}" alt="{{$enq->title}}"  class="img-fluid serviceImage">
							</div>
							<div class="body">
								<div class="title"> 
                                    <a href="{{route('service.details',$enq->slug)}}">
                                       {{$enq->title}}
                                     </a>
                                </div>
								
							</div>
						</div>
					</div>
                    @endforeach
				@endif
				</div>
			</div>
		</div>
	</div>	
@endsection