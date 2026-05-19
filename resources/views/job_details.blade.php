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
		<div class="content-wrap pt-3 pb-0">
			<div class="container">

				<div class="row">
                   
    					<div class="col-sm-12 col-md-12">
    			            <div class="box-fundraising">
    		              		<div class="body-content">
    		              			<h3 class="">
    		              			    <a href="#">{{$jobs->title}}</a>
    		              			</h3>
    		              			<div class="meta">
    		              			   
    									<span class="date"><i class="fa fa-clock-o"></i> {{ date('d M Y', strtotime($jobs->created_at))}}</span>
    									<span class="location"><i class="fa fa-map-marker"></i> {{$jobs->location}}</span>
    									
    								</div>
    		              			<div class="text">
    		              			    
    		              			    Skills :  {{$jobs->skills}}, 
    		              			    
    		              			     Experience : {{$jobs->experience}} ,
    		              			    Job Type : {{$jobs->job_type}} 
    		              			    ,
    		              			    No of Position: 
    		              			    {{$jobs->no_of_position}}, 
    		              			Last Date: {{$jobs->last_date_to_apply}}
    		              			<br/>
    		              			Description :
    		              			{!! $jobs->description !!}
    		              			</div>
    		              		
    		              			
    		              	     	<a href="#" class="btn btn-info mt-4 text-white   jobSelected" data-id="{{$jobs->id}}" data-toggle="modal" data-target="#exampleModalCenter">
    		              			    Apply Now
    		              			</a>
    		              			
    		              		</div>
    			            </div>
    			        </div>
    			        
				</div>

			</div>
		</div>
	</div>
	
	  @if(!empty($joblist) && count($joblist)>0)
		<div class="section">
        		<div class="content-wrap pt-0">
        			<div class="container">
        
        				<div class="row">
        				    
        				    <div class="col-md-12">
        			         	<h2 class="section-heading" data-aos="fade-up" data-aos-duration="1000">
        							Similar Jobs
        						</h2>
        					</div>
        					
                          
                                @foreach($joblist as $jobs)
            					<div class="col-md-6">
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
            		              			     <br/>
            		              			    Job Type : {{$jobs->job_type}} 
            		              			    ,
            		              			    No of Position: 
            		              			    {{$jobs->no_of_position}}, 
            		              			    <br/>
            		              			Last Date: {{$jobs->last_date_to_apply}}
            		              			
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
        			      
        				</div>
        
        			</div>
        		</div>
        	</div>
      @endif
@endsection