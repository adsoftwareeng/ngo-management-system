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
                 <form class="form-horizontal" action="{{ route('admin.videos.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($gallery)?$gallery->id:''}}">

                                <!--<div class="form-group row">-->
                                <!--    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>-->
                                <!--    <div class="col-md-10">-->
                                <!--    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($gallery)?$gallery->title:old('title')}}" placeholder="Enter title">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Video Url</label>
                                    <div class="col-md-10">
                                      <input type="text" class="form-control" name="image"  value="{{isset($gallery)?$gallery->image:old('image')}}" placeholder="Enter URL">
                                      <!--<br/><span class="text-danger">Note for youtube video only : Put only embed URL</span>-->
                                    </div>
                                </div>
                              
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-md-2 col-form-label" for="example-range">Status</label>-->
                                <!--    <div class="col-md-10">-->
                                <!--        <select class="form-control" name="status">-->
                                <!--            <option value="inactive"{{ isset($gallery)?($gallery->status=='inactive'?'selected':''):''}}>Inactive</option>-->
                                <!--            <option value="active" {{ isset($gallery)?($gallery->status=='active'?'selected':''):''}}>Active</option>-->
                                <!--        </select>-->
                                <!--    </div>-->
                                <!--</div>-->
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