@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')

	<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
          @if(!empty($team))
            @foreach($team as $enq1)
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
					@endif 
				</div>

			</div>
		</div>
	</div>
	
@endsection