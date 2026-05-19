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
                 <form class="form-horizontal" action="{{ route('admin.slider.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($slider)?$slider->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($slider)?$slider->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image <span class="text-info">(Size: 1920 × 870 px)</span></label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($slider)?asset('public/uploads/slider/'.$slider->image):''}}" class="img-responsive w-50">
                                    </div>
                                </div>
                                {{--------------
                                 <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-email"> Link URL </label>
                                    <div class="col-md-10">
                                    <input type="text" name="url" class="form-control" value="{{isset($slider)?$slider->url:old('url')}}" placeholder="Enter url"> 
                                    </div>
                                </div>
                                ----------------}}
                                 <input type="hidden" name="url" value="services"> 
                                 
                               <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-email"> Description </label>
                                    <div class="col-md-10">
                                    <input type="text" name="description" class="form-control" value="{{isset($slider)?$slider->description:old('description')}}" placeholder="Enter description"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-email"> Title &  Description Color </label>
                                    <div class="col-md-10">
                                    <input type="color" name="color" class="form-control" value="{{isset($slider)?$slider->color:old('color')}}" placeholder="Enter Color"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="inactive"{{ isset($slider)?($slider->status=='inactive'?'selected':''):''}}>Inactive</option>
                                            <option value="active" {{ isset($slider)?($slider->status=='active'?'selected':''):''}}>Active</option>
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