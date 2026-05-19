@extends('layouts.master_frontend')
@section('content')  


@include('partials.banner')

	<!-- CONTENT -->
	<div class="section">
		<div class="pt-4 pb-2">
			<div class="container">
				<div class="row">
                    
					<div class="col-sm-5 col-md-5">
						<img src="{{asset('public/uploads/team/'.$team->image)}}" class="aboutImg img-responsive w-100 img-fluid img-border">		
						
                    	<div class="spacer-30"></div>
					</div>

					<div class="col-sm-7 col-md-7">
					     	<h3> {{$team->name}}  </h3>
					    <p class="text-justify">Designation: {{$team->designation}}</p>
						<!--<div class="spacer-30"></div>-->
				    @if(!empty($team->social))
                        @php
                            $socialData = json_decode($team->social, true); 
                        @endphp
                        
                            @foreach($socialData as $key => $value)
                              @if(!empty($value))
                                <a href="{{ $value['link'] ?? '#' }}" target="_blank" class="">
                                    <span class="{{ $value['icon'] ?? '' }} h5 pl-1"></span>
                                </a>
                              @endif
                            @endforeach
                    @endif

				    	<div class="spacer-30"></div>
				    <p class="text-justify">
				         {{$team->description}}
				    </p>	
				    	 
				    	<div class="spacer-30"></div>
					</div>
				</div>


			</div>
		</div>
	</div>

<!--  -->
<!-- HOW TO HELP US -->

@if(!empty($otherteam) && count($otherteam)>0)
	<div class="section">
		<div class="content-wrap pt-0">
			<div class="container">
				<div class="row">
				    	<div class="col-md-12 ">
			

						<h2 class="section-heading center" data-aos="fade-up" data-aos-duration="1000">
						Other <span>Management</span> Team
							
							
						</h2>
					</div>
            @foreach($otherteam as $enq1)
							<div class="col-sm-3 col-md-3">
									<div class="rs-team-1 mb-5">
										<div class="media">
										    <a href="{{url('team-detail/'.$enq1->slug)}}">
											<img src="{{asset('public/uploads/team/'.$enq1->image)}}" class="teamImg img-responsive "  alt="{{$enq1->name}}">
											</a>
										</div>
										<div class="body">
											<div class="title">
											    <a href="{{url('team-detail/'.$enq1->slug)}}">
											        {{$enq1->name}}
											        </a></div>
											<div class="position">{{$enq1->designation}}</div>
											
                                    					<!---->
                                    @if(!empty($enq1->social))
                                        @php
                                            $socialData = json_decode($enq1->social, true); 
                                        @endphp
                                        
                                            @foreach($socialData as $key => $value)
                                              @if(!empty($value))
                                                <a href="{{ $value['link'] ?? '#' }}" target="_blank" class="">
                                                    <span class="{{ $value['icon'] ?? '' }} "></span>
                                                </a>
                                              @endif
                                            @endforeach
                                    @endif
										<!---->
											
										</div>
									</div>
								</div>
					   @endforeach
				</div>

			</div>
		</div>
	</div>
	
@endif 
<!--  -->

@endsection