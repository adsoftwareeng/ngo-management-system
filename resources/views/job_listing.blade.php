@extends('layouts.master_frontend')
@section('content')  
@include('partials.banner')
<style>
    .box-fundraising{
        background-color:#F8F8F8;
        color:#000;
    }
</style>
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
                    @if(!empty($joblist) && count($joblist)>0)
                        @foreach($joblist as $jobs)
    					<div class="col-sm-12 col-md-12">
    			            <div class="box-fundraising">
    		              		<div class="body-content">
    		              			<h3 class="">
    		              			    <a href="{{url('job-detail/'.$jobs->slug)}}">
    		              			        {{$jobs->title}}
    		              			   </a>
    		              			</h3>
    		              			<div class="meta">
    		              			   
    									<span class="date"><i class="fa fa-clock-o"></i> {{ date('d M Y', strtotime($jobs->created_at))}}</span>
    									<span class="location"><i class="fa fa-map-marker"></i> {{$jobs->location}}</span>
    									
    								</div>
    		              			<div class="text mb-3">
    		              			    
    		              			    Skills :  {{$jobs->skills}}, 
    		              			    
    		              			     Experience : {{$jobs->experience}} ,
    		              			    Job Type : {{$jobs->job_type}} 
    		              			    ,
    		              			    No of Position: 
    		              			    {{$jobs->no_of_position}}, 
    		              			Last Date: {{$jobs->last_date_to_apply}}
    		              			<br/>
    		              			Description :
    		              			{{ \Illuminate\Support\Str::limit(strip_tags($jobs->description), 200) }}

    		              			</div>
    		              			<a href="{{url('job-detail/'.$jobs->slug)}}" class="btn btn-primary">
    		              			    READ MORE
    		              			</a>
    		              			<a type="#" class="btn btn-info text-white   jobSelected" data-id="{{$jobs->id}}" data-toggle="modal" data-target="#exampleModalCenter">
    		              			    Apply Now
    		              			</a>
    		              		</div>
    			            </div>
    			        </div>
    			        @endforeach
			        @else
			     	<div class="col-sm-6 col-md-6">
			            <div class="box-fundraising">
		              	     <div class="body-content">
		              			<p class="title"><a href="#">No Jobs Available</a></p>
		              		</div>
			            </div>
			        </div>
			    
                    @endif
				</div>

			</div>
		</div>
	</div>

@endsection