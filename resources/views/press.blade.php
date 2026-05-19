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
                               <div class="col-xs-12 col-md-4">
	                               <div class="box-gallery galleryImage">
                                      <a href="{{asset('public/uploads/gallery/'.$enq->image)}}" title="{{$enq->title}}">
                                        <img src="{{asset('public/uploads/gallery/'.$enq->image)}}" alt="{{$enq->title}}"  class="img-fluid img-responsive galleryImg">
                                        <div class="project-info">
                                          <div class="project-icon">
                                            <span class="fa fa-search"></span>
                                          </div>
                                        </div>
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