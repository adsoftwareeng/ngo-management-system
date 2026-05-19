@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')


	<!-- OUR GALLERY -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row popup-gallery gutter-5">
							<!-- ITEM 1 -->
							@if(!empty($gallery))
                  @foreach($gallery as $enq)
                  <div class="col-xs-6 col-md-3">
                    <div class="box-gallery">
                      <a href="{{asset('public/uploads/gallery/'.$enq->image)}}" title="{{$enq->title}}">
                        <img src="{{asset('public/uploads/gallery/'.$enq->image)}}" alt="{{$enq->title}}" class="img-fluid certificate">
                      </a>
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