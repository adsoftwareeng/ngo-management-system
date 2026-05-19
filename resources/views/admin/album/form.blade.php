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
                 <form class="form-horizontal" action="{{ route('admin.album.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($album)?$album->id:''}}">

                            
                                  
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($album)?$album->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($album)?asset('public/uploads/album/'.$album->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Image Alt</label>
                                    <div class="col-md-10">
                                    <input type="text" name="alt" id="simpleinput" class="form-control" value="{{isset($album)?$album->alt:old('alt')}}" placeholder="Enter alt">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                             <option value="active" {{ isset($album)?($album->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($album)?($album->status=='inactive'?'selected':''):''}}>Inactive</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                  <div class="row   mt-4">
                                 
                                    <div class="col-md-12 pull-center text-center form-group">
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
        var html = $(".after-add-more").first().clone();
      
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
      
          $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
      
      
        $(".after-add-more").last().after(html);
      
     
       
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
});
</script>
@endsection