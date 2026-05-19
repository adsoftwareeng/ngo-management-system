@extends('layouts.master')
@section('content')
  <!-- start page title -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".date", {
                enableTime: true,
                dateFormat: "d-m-Y h:i:K",
                
            });
        });
    </script>
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
                 <form class="form-horizontal" action="{{ route('admin.activity.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($activity)?$activity->id:''}}">
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control type" name="type">
                                         <option value="image"{{ isset($activity)?($activity->type=='image'?'selected':''):''}}>Image</option>
                                            <option value="video" {{ isset($activity)?($activity->type=='video'?'selected':''):''}}>Video</option>
                                         
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" class="form-control" value="{{isset($activity)?$activity->name:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label inputName" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle form-control  inputType" name="image"  accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        @if(isset($activity))
                                          @if($activity->type=='image')
                                          <img 
                                            src="{{isset($activity)?asset('public/uploads/activity/'.$activity->image):''}}" 
                                          class="img-responsive w-25">
                                          @else
                                          <iframe src="{{$activity->image}}">    
                                          </iframe>
                                          @endif
                                        @endif
                                    </div>
                                </div>
                               <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" placeholder="Enter description" name="description">{{isset($activity)?$activity->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Location</label>
                                    <div class="col-md-10">
                                    <input type="text" name="location" id="simpleinput" class="form-control" value="{{isset($activity)?$activity->location:old('location')}}" placeholder="Enter location">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">City</label>
                                    <div class="col-md-10">
                                    <input type="text" name="city" class="form-control" value="{{isset($activity)?$activity->city:old('city')}}" placeholder="Enter city">
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Start Date</label>
                                    <div class="col-md-10">
                                         
                                    <input type="text" name="start_date" id="start_date" class="form-control date" value="{{isset($activity) ? date('d-m-Y', strtotime($activity->start_date)) :old('start_date')}}" placeholder="Enter Start Date">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">End Date</label>
                                    <div class="col-md-10">
                                         
                                    <input type="text" name="end_date" id="end_date" class="form-control date" value="{{isset($activity) ? date('d-m-Y', strtotime($activity->end_date)) :old('end_date')}}" placeholder="Enter end Date">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            
                                            <option value="active" {{ isset($activity)?($activity->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($activity)?($activity->status=='inactive'?'selected':''):''}}>Inactive</option>
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


@if(isset($activity))
  @if($activity->type=='video')
     <script>
          $('.inputName').text('Video URL');
          $('.inputType').attr('type','url'); 
          $('.inputType').val('{{$activity->image}}'); 
     </script>
  @endif
@endif
<script>
$(document).ready(function(){
    
  $(".type").change(function(){
      
      let type = $(this).val();
      //console.log(type);
      if(type=='video'){

          $('.inputName').text('Video URL');
          $('.inputType').attr('type','url');

      }else{

          $('.inputName').text('Image');
          $('.inputType').attr('type','file');
          $('.inputType').val('');

      }
  });
      
});
</script>
@endsection