@extends('layouts.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
                 <form class="form-horizontal" action="{{ route('admin.videos.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($gallery)?$gallery->id:''}}">
                    
                              <div class="form-group row after-add-more">
                                <label class="col-md-2 col-form-label" for="example-email">Video Url</label>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="image[]"  value="{{isset($gallery)?$gallery->image:old('image')}}" placeholder="Enter URL">
                                   </div>
                                  
                                   <label class="col-md-2 col-form-label change" for="example-email"></label>
                                </div>
                              
                               
                                  <div class="form-group row pull-center text-center">
                                    <div class="col-md-12">
                                         <a class="btn btn-success add-more mr-3">
                                             <i class="fa fa-plus"></i> Add More</a>
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