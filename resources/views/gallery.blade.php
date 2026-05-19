@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')


<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row popup-gallery gutter-5">
							<!-- ITEM 1 -->
						@if(!empty($gallery) && count($gallery)>0)
                            @foreach($gallery as $key => $enq)
							<div class="col-xs-12 col-md-4">
								<div class="box-gallery galleryImage">
									<a href="{{asset('public/uploads/gallery/'.$enq->image)}}" title="{{$enq->title}}">
										<img src="{{asset('public/uploads/gallery/'.$enq->image)}}" alt="{{$enq->title}}" class="img-fluid img-responsive galleryImg">
										<div class="project-info">
											<div class="project-icon">
												<span class="fa fa-search"></span>
											</div>
										</div>
									</a>
								</div>
							</div>
							@endforeach
							
							@else
							<div class="col-xs-12 col-md-12">
								<div class="box-gallery galleryImage pull-center text-center p-5 bg-info text-white">
									<h3>No Image</h3>
								</div>
							</div>
						
						@endif
						
							
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>



@endsection