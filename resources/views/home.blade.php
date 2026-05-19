@extends('layouts.master_frontend')
@section('content')

  <!-------------- start slider -------------->

    @if(!empty($slider) && count($slider)>0)
  <!-- BANNER -->
	<div id="oc-fullslider" class="banner owl-carousel">
	     @foreach($slider as $slide)
        <div class="owl-slide">
        	<div class="item">
        	    @if($slide->type=='video')
        	    <video width="100%" height="100%" auto controls autoplay class="videoDiv">
			      <source src="{{asset('public/uploads/slider/'.$slide->image)}}" type="video/mp4">
			      <source src="{{asset('public/uploads/slider/'.$slide->image)}}" type="video/ogg">
			    </video>
        	    @else
        	      <img src="{{asset('public/uploads/slider/'.$slide->image)}}" alt="{{$slide->title}}">
        	    @endif
        	   <div class="slider-pos">
		            <div class="container">
		                  @if(!empty($slide->title))
		            	<div class="wrap-caption center">
			                <h1 class="caption-heading" style="color:{{$slide->color}}">{{$slide->title}}</h1>
			                <p class="" style="color:{{$slide->color}}">{{$slide->description}}</p>
			                <!--<a href="{{url('donate-us')}}" class="btn btn-primary">DONATE NOW</a>-->
			            </div> 
			            @endif
		            </div>  
	            </div>  
            </div>  
        </div>
        @endforeach
    </div>

	<div class="clearfix"></div>
	 
	<!-- SHORTCUT --> 
  @endif
  <!------------- end slider --------------->
  
	<div class="section services">
		<div class="content-wrap cardDiv  pb-0">
			<div class="container">
				<div class="row">
				    
					<div class="col-sm-12 col-md-12">
						<div class="row col-0 overlap">
							<div class="col-sm-4 col-md-4">
								<!-- BOX 1 -->
								<div class="rs-feature-box-1" data-background="{{asset('public/frontend/images/cause-img-1.jpg')}}">
									<div class="body">
										<a href="{{ route(Auth::user() ? 'user.dashboard' : 'userlogin') }}" class="uk18">Generate ID Card</a>
										<h3>ID Card</h3>
									</div>
					            </div>
							</div>
							<div class="col-sm-4 col-md-4">
								<!-- BOX 2 -->
								<div class="rs-feature-box-1 bgdark" data-background="{{asset('public/frontend/images/bg-map-dot.jpg')}}">
									<div class="body">
										<a href="{{ route(Auth::user() ? 'user.dashboard' : 'userlogin') }}" class="uk18">Generate Appointment Letter</a>
										<h3>Appointment Letter</h3>
									</div>
					            </div>
							</div>
							<div class="col-sm-4 col-md-4">
								<!-- BOX 3 -->
								<div class="rs-feature-box-1" data-background="{{asset('public/frontend/images/cause-img-2.jpg')}}">
									<div class="body">
										<a href="{{ route(Auth::user() ? 'user.dashboard' : 'userlogin') }}" class="uk18">Generate Certificate</a>
										<h3>Certificate</h3>
									</div>
					            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
	<div class="clearfix"></div>
    	 <!-- initiatives -->

<!-- WELCOME TO NGOO-->
	<div class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-3 pb-2">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
			

						<h2 class="section-heading" data-aos="fade-up" data-aos-duration="1000">
							{!!split_title($about->title) !!}
							
							
						</h2>
					</div>
					
					<div class="col-md-6">
						<div class="hover-img"  data-aos="fade-up" data-aos-duration="1000">
							<img src="{{asset('public/uploads/page/'.$about->image)}}" alt="{{$about->title}}" class="img-fluid">
						</div>
					</div>
					<div class="col-md-6">
						<p class="text-justify" data-aos="fade-down" data-aos-duration="1000">{!! $about->summary !!}</p>
						<div class="spacer-30"></div>
						<a href="{{url('about')}}" data-aos="fade-up" data-aos-duration="1000" class="btn btn-primary">Read More</a>

					</div>


				</div>
			</div>
		</div>
	</div>

	<div class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-3 pb-2">
			<div class="container">
				<div class="row ">
                    <div class="col-md-12">
                        	<h2 class="section-heading" data-aos="fade-up" data-aos-duration="1000">
                        	    <span>President </span>Message
							
					    	</h2>
					
                    </div>
					<div class="col-md-6 col-12 order-2 order-lg-1">
					    
						<p class="text-justify" data-aos="fade-down" data-aos-duration="1000">{{$msg->summary}}
						  
						</p>
						 <em class="text-right pull-right">{{$msg->title}}</em>
						<div class="spacer-30"></div>
						<a href="{{url('pages/president')}}" data-aos="fade-up" data-aos-duration="1000" class="btn btn-primary">Read More</a>


					</div>
					
					<div class="col-md-6 col-12 order-1 order-lg-2">
					    <!--<div class="hover-img">-->
				     	<img src="{{asset('public/uploads/page/'.$msg->image)}}" alt="{{$msg->title}}" data-aos="fade-down" data-aos-duration="1000" class=" img-responsive w-100">
				     		<div class="spacer-30"></div>
					    <!--</div>-->
						
					</div>


				</div>
			</div>
		</div>
	</div>
	<!--// video-->
	@php $homeSection = getPages('home'); @endphp 
	@if(!empty($homeSection->url) && !empty($homeSection->url2))
	<div class="section mt-4 mb-4"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
				    @if(!empty($homeSection->url))
					<div class="col-sm-6 col-md-6">
					
					    <div class="embed-responsive embed-responsive-16by9 mb-3">
                          <iframe class="embed-responsive-item" src="{{getPages('home')->url}}?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>

					</div>
                    @endif
                    @if(!empty($homeSection->url2))
					<div class="col-sm-6 col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="{{getPages('home')->url2}}?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
					
					</div>
                    @endif
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--//end-->
	
	
		@if(!empty($homeSection->description))
	
	@php $description =  json_decode($homeSection->description,true) @endphp 
	<div class="section cta" data-background="{{asset('public/frontend/2.jpg')}}"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap content-wrap-2x">
			<div class="container">
				<div class="row">
                    @for($i=1; $i<=4; $i++)
					<div class="col-sm-3 col-md-3">
						<div class="rs-icon-funfact" data-aos="fade-up" data-aos-duration="1000">
							<div class="icon">
							    <i class="fa {{@$description['icon'.$i]}}"></i>
								<!--<i class="fa fa-file-text-o"></i>-->
							</div>
							<div class="body-content">
								<h2>{{@$description['number'.$i]}}</h2>
								<p class="uk18">{{@$description['title'.$i]}}</p>
							</div>
						</div>
					</div>
                    @endfor

				</div>
			</div>
		</div>
	</div>
    @endif
	
	<!--// full width image-->
	@if(!empty($homeSection->image))
	<div class="section mb-5"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
		                <img src="{{asset('public/uploads/page/'.$homeSection->image)}}" class="img-responsive w-100 banner1Image">
					</div>
        		</div>
			</div>
		</div>
	</div>
	@endif
	
	@if(!empty($homeSection->image3))
	<div class="section mb-4"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
				    @php $thirdImages = json_decode($homeSection->image3,true); @endphp 
				    @foreach($thirdImages as $image3)
				 	<div class="col-sm-4">
		                <img src="{{asset('public/uploads/page/'.$image3)}}" class="img-responsive w-100 banner3Image mb-3">
					</div>
					@endforeach
        		</div>
			</div>
		</div>
	</div>
	@endif
	
	@if(!empty($homeSection->image2))
	
	<div class="section mb-3"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
				 @php $secondImages = json_decode($homeSection->image2,true); @endphp 
				    @foreach($secondImages as $image2)
				 	<div class="col-sm-6">
		                <img src="{{asset('public/uploads/page/'.$image2)}}" class="img-responsive w-100 banner2Image mb-3">
					</div>
					@endforeach
        		</div>
			</div>
		</div>
	</div>
	@endif
	<!--// full width image-->
	
	
		@if(!empty($events))
	<div id="cause" class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-3 pb-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading center">
						    Initiative
						</h2>
						
					</div>
					<div class="clearfix"></div>
					
                  @foreach($events as $enq)
                  

					<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising initiveBox">
		              		<div class="media">
		                		<img src="{{asset('public/uploads/initiative/'.$enq->image)}}" alt="" class="img-responsive img-fluid initiveEventImg">
		              		</div>
		              		<div class="body-content">
		              			<!--<p class="title scrollDiv"><a href="{{url('initiative-detail/'.$enq->slug)}}">{{$enq->name}}</a></p>-->
		              				<p class="title mb-0">
		              				    <a href="{{url('initiative-detail/'.$enq->slug)}}">
		              				        <marquee>{{$enq->name}}</marquee>
		              				    </a>
		              				</p>
		              			
		              			<div class="text text-justify initiveDecLength">{{ substr($enq->description,0,100)}}</div>
		              			<div class="progress-fundraising pull-center text-center">
			              		    <a href="{{url('initiative-detail/'.$enq->slug)}}" class="btn btn-primary">READ MORE</a>
			              		</div>
		              		</div>
			            </div>
			        </div>
							            
			        <!-- Item 3 -->
			        
                  @endforeach

					<div class="col-sm-12 col-md-12">
						<!--<div class="spacer-50"></div>-->
						<div class="text-center">
							<a href="{{route('initiative')}}" class="btn btn-primary">View All</a>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	@endif
    	 <!---->

<!------------------------------------------------------------------------------------------------------------>

     	<!-- HOW TO HELP US -->
     @php $howtohelpus = getPages('how_to_help_us'); @endphp 
	@if(!empty($howtohelpus))
	<div class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap-top">
			<div class="container">
				<div class="row align-items-end">

					<div class="col-sm-6 col-md-6">
						<img src="{{asset('public/uploads/page/'.$howtohelpus->image)}}" alt="{{$howtohelpus->title}}"  class="img-fluid" data-aos="fade-up" data-aos-duration="1000">
					</div>

					<div class="col-sm-6 col-md-6">
						<h2 class="section-heading">
						    	{!!split_title($howtohelpus->title) !!}
						</h2>
						<div class="section-subheading">
						    {{$howtohelpus->summary}}
						</div> 
						@if(!empty($howtohelpus->description))
						<div class="margin-bottom-50"></div>
						<dl class="hiw" data-aos="fade-up" data-aos-duration="1000">
						    @php $description =  json_decode($howtohelpus->description,true) @endphp 
                           @for($i=1; $i<=3; $i++)
						 
							<dt><span class="{{@$description['icon'.$i]}}"></span></dt>
							<dd><div class="no">01</div>
							<h3>
							    {{@$description['title'.$i]}}
							</h3>
							{{@$description['description'.$i]}}
						</dd>
					    	@endfor
						</dl>
						@endif
						<div class="spacer-70"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
    @endif
     <!-- WE HELP MANY PEOPLE -->
	<div class="section" data-background="{{asset('public/frontend/2.jpg')}}"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="cta-info color-white">
							<h1 class="section-heading light no-after" data-aos="fade-up" data-aos-duration="1000">
								<span>We Help Many</span> People
							</h1>
							<h3 class="color-primary">Want to Become a Volunteer</h3>

							<div class="spacer-10"></div>
							<p>Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent. Sed ut perspiciatis unde omnis iste natus error sit .</p>

							<a href="{{url('donate-us')}}" class="btn btn-light margin-btn mb-2" data-aos="fade-up" data-aos-duration="1000">DONATE NOW</a>
							<a href="{{url('join-us')}}" class="btn btn-primary margin-btn" data-aos="fade-up" data-aos-duration="1000">JOIN US </a>	
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- team -->
	<!-- OUR VOLUUNTER SAYS -->
	
	@include('partials.testimonials')
	

	

    <!-- EVENTS -->
    <!-- FUN FACT -->
<!-- OUR GALLERY -->
@if(!empty($gallery) && count($gallery)>0)
	<div class="section" data-background="#"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-2 pb-0">
			<div class="container">
				<div class="row">

					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading center">
							Our <span>Gallery</span>
						</h2>
					</div>

					<div class="row popup-gallery gutter-5">
					@foreach($gallery as $key => $enq)
						<div class="col-xs-12 col-md-4">
							<div class="box-gallery galleryImage" @if($key/2==0) data-aos="fade-up" @elseif($key/2==1) data-aos="fade-down" @else data-aos="fade-up" @endif  data-aos-duration="1000">
								<a href="{{asset('public/uploads/gallery/'.$enq->image)}}" title="{{$enq->title}} #{{$enq->id}}">
									<img src="{{asset('public/uploads/gallery/'.$enq->image)}}"  alt="" class="img-fluid img-responsive galleryImg">
								</a>
							</div>
						</div>
					@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
	
<!---->
@if($homeSection->popup_show=='show')
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="{{asset('public/uploads/page/'.$homeSection->popup)}}" class="img-responsive w-100">
      </div>
     
    </div>
  </div>
</div>
    <!-- Modal -->
@endif
@endsection

