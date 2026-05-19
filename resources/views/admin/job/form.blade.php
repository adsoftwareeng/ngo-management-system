@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{generalSetting()->site_name}}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"> {{$main_title}}</a></li>
                    <li class="breadcrumb-item active"> {{$page_title}}  </li>
                </ol>
            </div>
            <h4 class="page-title"> {{$page_title}} </h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-title"> {{$page_title}}  </h4>
                </div>
                <div class="col-2">
                    <a href="{{route($go_back_url)}}" class="btn btn-info btn-xs"> <i class="fa fa-arrow-left"></i> 
                        Go Back
                    </a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form class="form-horizontal" action="{{ route('admin.job.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($job)?$job->id:''}}">
                               
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">job Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($job)?$job->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                
                             
                               
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Key Skills</label>
                                    <div class="col-md-10">
                                    <input type="text" name="skills" class="form-control" value="{{isset($job)?$job->skills:old('skills')}}" placeholder="Enter  job skills">
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Location</label>
                                    <div class="col-md-10">
                                    <input type="text" name="location" class="form-control" value="{{isset($job)?$job->location:old('location')}}" placeholder="Enter  job location">
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Experience</label>
                                    <div class="col-md-10">
                                    <input type="text" name="experience" class="form-control" value="{{isset($job)?$job->experience:old('experience')}}" placeholder="Enter  job experience">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                <label for="job_type" class="col-md-2 col-form-label">Job Type</label>
                                
                                    <div class="col-md-10">
                                <select name="job_type" id="job_type" class="form-control">
                                    <option value="" select disabled>Select Job Type</option>
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="freelance">Freelance</option>
                                    <option value="contract">Contract</option>
                                    <option value="internship">Internship</option>
                                    <option value="temporary">Temporary</option>
                                    <option value="remote">Remote</option>
                                </select>
                            </div>
                            </div>
                               
                             <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Number of position</label>
                                    <div class="col-md-10">
                                    <input type="text" name="no_of_position" class="form-control" value="{{isset($job)?$job->no_of_position:old('no_of_position')}}" placeholder="Enter  job No of position">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote" style="height:300px;"  placeholder="Enter description" name="description">{{isset($job)?$job->description:old('description')}}</textarea>
                                    </div>
                                </div>    
                                
                               
                            
                             
                             
                             <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Last date of apply</label>
                                    <div class="col-md-10">
                                    <input type="date" name="last_date_to_apply" class="form-control" value="{{isset($job)?$job->last_date_to_apply:old('last_date_to_apply')}}" placeholder="Enter  last date to apply">
                                    </div>
                                </div>
                                
                                
                                 
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">

                                            <option value="active" {{ isset($job)?($job->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($job)?($job->status=='inactive'?'selected':''):''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                  <div class="form-group row pull-center text-center">
                                    <div class="col-md-12">
                                        <button  type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </form>

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
      <!-- End Form -->
    </div>
</div>
<!-- end row -->

@endsection