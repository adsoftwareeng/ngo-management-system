@extends('layouts.master_frontend')
@section('content')  

<style>
    .eventImg{
        width:100% !important;
        height:300px !important;
        object-fit:contain;
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
    label{
        color:#816f6f;
    }
    .textHeading{
        color:#FF7000;
    }
    
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
          .sliderImage{
            height:200px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }
        
    }
    
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
          .sliderImage{
            height:200px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }
        
    }
    
    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
          .sliderImage{
            height:300px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }
        
    } 
    
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
              .sliderImage{
                height:300px !important;
                /*object-fit:contain !important;*/
                width:100% !important;
            }
            
    } 
    
    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
          .sliderImage{
            height:360px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }

    }
  </style>
      
<!-- BANNER -->
<div class="section banner-page" data-background="{{asset('public/uploads/initiative/'.$events->image)}}">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">{{$page_title}}</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>



<!-- HOW TO HELP US -->
<!---->
	<div class="section">
		<div class="content-wrap pt-2">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading">
							{!!split_title($events->name) !!}
						</h2>
                    </div>
                    
					<div class="col-sm-6 col-md-6">
					    	<!-------------------->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100 img-responsive sliderImage" src="{{asset('public/uploads/initiative/'.$events->image)}}" alt="{{$events->name}}">
                                </div>
                                @if(!empty($events->image2))
                                <div class="carousel-item">
                                  <img class="d-block w-100 img-responsive sliderImage" src="{{asset('public/uploads/initiative/'.$events->image2)}}" alt="{{$events->name}}">
                                </div>
                                @endif
                                @if(!empty($events->image3))
                                <div class="carousel-item">
                                  <img class="d-block w-100 img-responsive sliderImage" src="{{asset('public/uploads/initiative/'.$events->image3)}}" alt="{{$events->name}}">
                                </div>
                                @endif
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        <!--------------------->
						<!--<div class="img-video">-->
						<!--	<a href="{{$events->video}}" class="popup-youtube play-video"><i class="fa fa-play fa-2x"></i></a>-->
						<!--	<img src="{{asset('public/uploads/initiative/'.$events->video_image)}}" alt="">-->
						<!--	<div class="ripple"></div>-->
						<!--</div>-->
						 <div class="spacer-30"></div>
						
                	</div>
					<div class="col-sm-6 col-md-6">
					    	@if(!empty($events->subtitle))
    				        	<blockquote class="text-justify">{{$events->subtitle}} </blockquote>
    					   @endif
                            <p class="text text-justify">{{$events->description}}</p>
    						
					</div>

                     <!---->
                      <div class="col-sm-12 col-md-12">
                            {!!$events->add_more!!}
                      </div>
                   @if(!empty($faq) && count($faq)>0)
                   <div class="spacer-30"></div>
                        <div class="col-sm-12 col-md-12">
    						<h2 class="section-heading">
    							Frequently Asked Questions (FAQs)
    						</h2>
    						<!--<div class="section-subheading">{{$events->faq_description}}</div> -->
    						<!--<div class="margin-bottom-50"></div>-->
    						
    						<div class="accordion rs-accordion" id="accordionExample">
    							<!-- Item 1 -->
    						@php $i=1 @endphp 
    						@foreach($faq as $faqs)
    						
    						 @if($i==1)
    						  <div class="card mb-2">
    						    <div class="card-header" id="heading{{$i}}">
    						      <h4 class="title">
    						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
    						          {{$faqs->heading}}
    						        </button>
    						      </h4>
    						    </div>
    						    <div id="collapse{{$i}}" class="collapse show" aria-labelledby="heading{{$i}}" data-parent="#accordionExample" style="">
    						      <div class="card-body">
    						           {{$faqs->description}}
    						      </div>
    						    </div>
    						  </div>
                              @else
    							<!-- Item 2 -->
    						  <div class="card mb-2">
    						    <div class="card-header" id="heading{{$i}}">
    						      <h4 class="title">
    						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
    						          {{$faqs->heading}}
    						        </button>
    						      </h4>
    						    </div>
    						    <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample" style="">
    						      <div class="card-body">
    						         {{$faqs->description}}
    						       </div>
    						    </div>
    						  </div>
    						  @endif
    				        @php  $i++; @endphp
    						@endforeach
    						</div>
    					</div>
    				@endif
						 <!---->
				</div>
    
			</div>
		</div>
	</div>
<!-- HOW TO HELP US -->
	
<!---->
    @if(!empty($gallery) && count($gallery)>0)
         <div class="section box-fundraising mb-0">
    		<div class="content-wrap pt-2">
    			<div class="container ">
                    		
    				<div class="row">
        				<div class="col-md-12">
    				    	<h2 class="section-heading">
    						   Initiative	Gallery 
    						</h2>
    					</div>
    					<!---->
    				    <div class="slider-container">
                            <div class="slider-wrapper" id="sliderWrapper">
                                @foreach($gallery as $enq)
                                    <div class="slider-item">
                                        <img src="{{asset('public/uploads/gallery/'.$enq->image)}}" class="img-fluid img-responsive galleryImg" alt="{{$enq->title}}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="slider-nav">
                                <button id="prevBtn">&lt;</button>
                                <button id="nextBtn">&gt;</button>
                            </div>
                        </div>
            			<!---->
    				</div>
    			</div>
    		</div>
    	</div>
    @endif

@endsection