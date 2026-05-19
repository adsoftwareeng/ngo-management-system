@extends('layouts.master')
@section('content')
  <!-- start page title -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#event_date", {
                enableTime: false,
                dateFormat: "d-m-Y"
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
                 <form class="form-horizontal" action="{{ route('admin.event.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($event)?$event->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($event)?$event->name:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($event)?asset('public/uploads/event/'.$event->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                               <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" placeholder="Enter description" name="description">{{isset($event)?$event->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Location</label>
                                    <div class="col-md-10">
                                    <input type="text" name="location" id="simpleinput" class="form-control" value="{{isset($event)?$event->location:old('location')}}" placeholder="Enter location">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Event Date</label>
                                    <div class="col-md-10">
                                        
                                  @php  if(isset($event)){
                                         
                   $event_date =  date('d-m-Y', strtotime($event->event_date)); 
                
                                         }
                                  @endphp 
                                    <input type="text" name="event_date" id="event_date" class="form-control" value="{{isset($event) ? date('d-m-Y', strtotime($event->event_date)) :old('event_date')}}" placeholder="Enter Event Date">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control type" name="type">
                                         <option value="recent"{{ isset($event)?($event->type=='recent'?'selected':''):''}}>Recent</option>
                                            <option value="upcoming" {{ isset($event)?($event->type=='upcoming'?'selected':''):''}}>Upcoming</option>
                                         
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            
                                            <option value="active" {{ isset($event)?($event->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($event)?($event->status=='inactive'?'selected':''):''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                
                         <div class="form-group row dnone d-none ">
                            <label class="col-md-2 col-form-label" for="simpleinput">Is registration </label>
                            <div class="col-md-10">
                                <select class="form-control" name="is_registration">
                                <option value="0" {{ isset($event)?($event->is_registration==0?'selected':''):''}}>No</option>
                              <option value="1"{{ isset($event)?($event->is_registration==1?'selected':''):''}}>Yes</option>
                               </select>
                            </div>
                        </div>
                        
                        
                      <div class="form-group row dnone d-none">
                          <label class="col-md-2 col-form-label" for="example-range">Is paid</label>
                             <div class="col-md-10">
                                      
                                         
                          <select class="form-control is_paid" name="is_paid">
                              <option value="free" {{ isset($event)?($event->is_paid=='free'?'selected':''):''}}>Free</option>
                              <option value="paid"{{ isset($event)?($event->is_paid=='paid'?'selected':''):''}}>Paid</option>
                          </select>
                               
                            </div>
                        </div>
            
                      <div class="form-group row dnone2 d-none">
                            <label class="col-md-2 col-form-label" for="example-range">Registeration Fees </label>
                            <div class="col-md-10">
                                 <input type="number" name="fees" class="form-control" value="{{isset($event)?$event->fees:old('fees')}}" placeholder="Enter Fees">
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
@if(isset($event))
  @if($event->type=='upcoming')
    <script>
      $(document).ready(function(){
           $('.dnone').removeClass('d-none');
      });
    </script>
   @endif
    @if($event->is_paid=='paid')
    <script>
      $(document).ready(function(){
           $('.dnone2').removeClass('d-none');
      });
    </script>
   @endif
@endif
<script>
$(document).ready(function(){
      $(".type").change(function(){
          
              let type = $(this).val();
    
              if(type=='upcoming'){
    
                  $('.dnone').removeClass('d-none');
    
                  if($(".is_paid").val()=='paid'){
    
                     $('.dnone2').removeClass('d-none');                  
    
                  }else{
    
                      $('.dnone2').addClass('d-none');
    
                  }
              }else{
    
                  $('.dnone').addClass('d-none');
                  $('.dnone2').addClass('d-none');
    
              }
              
      });
      
      // is paid 
      
      $(".is_paid").change(function(){
          
              let fees = $(this).val();
            //   console.log(type);
     
              if(fees=='paid'){
     
                  $('.dnone2').removeClass('d-none');
     
              }else{
     
                  $('.dnone2').addClass('d-none');
     
              }
              
      });
});
</script>
@endsection