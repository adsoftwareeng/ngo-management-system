@extends('layouts.master')
@section('content')
  <!-- start page title -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <script>
        document.addinitiativeListener('DOMContentLoaded', function() {
            flatpickr("#initiative_date", {
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
                 <form class="form-horizontal" action="{{ route('admin.initiative.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($initiative)?$initiative->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($initiative)?$initiative->name:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($initiative)?asset('public/uploads/initiative/'.$initiative->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Summary</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" placeholder="Enter Summary" name="description">{{isset($initiative)?$initiative->description:old('description')}}</textarea>
                                    
                                   </div>
                                  
                                </div>
                                
                               <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote" placeholder="Enter description" name="add_more">{{isset($initiative)?$initiative->add_more:old('add_more')}}</textarea>
                                    </div>
                                </div>
                                
                              
                                    
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            
                                            <option value="active" {{ isset($initiative)?($initiative->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($initiative)?($initiative->status=='inactive'?'selected':''):''}}>Inactive</option>
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
<script>
    $(document).ready(function() {
    $("body").on("click",".add-more",function(){ 
        var html = $(".after-add-more").first().clone().find("input").val("").end();
      
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
      
          $(html).find(".change").html("<a class='text-danger remove'><i class='fa fa-times'></i> Remove</a>");
      
      
        $(".after-add-more").last().after(html);
      
     
       
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
});
</script>
@endsection