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
                 <form class="form-horizontal" action="{{ route('admin.service.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($service)?$service->id:''}}">
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Project Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($service)?$service->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                 {{------------
                                  <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Select Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="categoryData" name="category">
                                            <option value="" selected disabled>Select</option>
                                            @if(!empty($category) && count($category))
                                                @foreach($category as $cate)
                                                <option value="{{$cate->id}}"{{ isset($service)?($service->category==$cate->id?'selected':''):''}}>{{$cate->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Select Sub Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="subcategoryData" name="subcategory">
                                          @if(isset($service))
                                          <option value="{{$service->subcategory}}">
                                              {{$service->subcategory?getCategory($service->subcategory)->title:''}}
                                          </option>
                                          @else
                                             <option value="" selected disabled>Select</option>
                                          @endif
                                        </select>
                                        <!-- <em class="text-danger">Sub Category not mandatory if you want you can choose. </em> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Project Screen  Short</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="breadcrumbs" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($service)?asset('public/uploads/service/'.$service->breadcrumbs):''}}" class="img-responsive w-25">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Total Number  of pages in Project</label>
                                    <div class="col-md-10">
                                    <input type="number" name="no_of_pages" id="simpleinput" class="form-control" value="{{isset($service)?$service->no_of_pages:old('no_of_pages')}}" placeholder="Enter Total Number of  Project">
                                    </div>
                                </div>

                                -----}}
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($service)?asset('public/uploads/service/'.$service->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                
                            
                              {{-------------
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email">Video URL </label>
                                    <div class="col-md-10">
                                    <input type="text" name="url" class="form-control" value="{{isset($service)?$service->url:old('url')}}" placeholder="Enter url"> 
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Project Fee</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="project_fee">
                                            <option value="free"{{ isset($service)?($service->project_fee=='free'?'selected':''):''}}>Free</option>
                                            <option value="paid" {{ isset($service)?($service->project_fee=='paid'?'selected':''):''}}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Summary</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" placeholder="Enter summary" name="summary">{{isset($service)?$service->summary:old('summary')}}</textarea>
                                    </div>
                                </div>
                                ----------------}}
                                
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Breadcrumbs</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="breadcrumbs" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($service)?asset('public/uploads/service/'.$service->breadcrumbs):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                 
                       
                               
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote" style="height:300px;"  placeholder="Enter description" name="description">{{isset($service)?$service->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">

                                            <option value="active" {{ isset($service)?($service->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($service)?($service->status=='inactive'?'selected':''):''}}>Inactive</option>
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