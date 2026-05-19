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
                 <form class="form-horizontal" action="{{ route('admin.team.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($team)?$team->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title/Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($team)?$team->name:old('name')}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($team)?asset('public/uploads/team/'.$team->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                              
                              
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Designation/Position</label>
                                    <div class="col-md-10">
                                        <input type="text" name="designation" class="form-control" value="{{isset($team)?$team->designation:old('designation')}}" placeholder="Designation">
                                       
                                    </div>
                                </div>
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       
                                       <textarea class="form-control" placeholder="Enter description" name="description">{{isset($team)?$team->description:old('description')}}</textarea>
                                       
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Social Links</label>
                                    <div class="col-md-10">
                                      <!---->
                                     
                                      <div class="after-add-more row">
                
                                        <div class="col-md-3">                                
                                            <div class="form-group">
                                              <label class="control-label">Name</label>
                                                      <select name="social[][name]" class="form-control">
                                            <option value="" selected disabled>Select Name</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="linkedin">LinkedIn</option>
                                    <option value="youtube">YouTube</option>
                                    <option value="gmail">Gmail</option>
                                    <option value="pinterest">Pinterest</option>
                                    <option value="reddit">Reddit</option>
                                    <option value="whatsapp">WhatsApp</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">                                
                                            <div class="form-group">
                                              <label class="control-label">Link</label>
                                                        <input  type="text" class="form-control" placeholder="" name="social[][link]" />
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">                                
                                         <div class="form-group">
                                    <label class="control-label">Icon</label>
                              <select name="social[][icon]" class="form-control">
                                            <option value="" selected disabled>Select Icon</option>
                                    <option value="fa fa-facebook">Facebook</option>
                                   <option value="fa fa-twitter">Twitter</option>
                                    <option value="fa fa-instagram">Instagram</option>
                                    <option value="fa fa-linkedin">LinkedIn</option>
                                    <option value="fa fa-youtube">YouTube</option>
                                    <option value="fa fa-envelope">Gmail</option>
                                    <option value="fa fa-pinterest">Pinterest</option>
                                    <option value="fa fa-reddit">Reddit</option>
                                    <option value="fa fa-whatsapp">WhatsApp</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <div class="form-group change">
                                                        <label for="">&nbsp;</label><br/>
                                                        <a class="btn btn-success add-more">+ Add More</a>
                                                    </div>
                                                </div>
                                            </div>
                                                                                  <!---->
                                       
                                    </div>
                                </div>
                                
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                             <option value="active" {{ isset($team)?($team->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($team)?($team->status=='inactive'?'selected':''):''}}>Inactive</option>
                                           
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