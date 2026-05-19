@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')


<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row ">
							<!-- ITEM 1 -->
						@if(!empty($gallery))
                            @foreach($gallery as $key => $enq)
                             <div class="col-md-4">
                                 <div class="embed-responsive embed-responsive-16by9 mb-4">
                                 <iframe width="853" height="480" src="{{$enq->image}}" class="embed-responsive-item" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                 </div>
							</div>
							@endforeach
						@endif
						
							
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>



@endsection