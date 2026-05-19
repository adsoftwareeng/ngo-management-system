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
                 <form class="form-horizontal" action="{{ route('admin.course.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($course)?$course->id:''}}">
                               
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Course Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($course)?$course->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                {{--------------
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($course)?asset('public/uploads/course/'.$course->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                
                                  <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Select Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="categoryData" name="category">
                                            <option value="" selected disabled>Select</option>
                                            @if(!empty($category) && count($category))
                                                @foreach($category as $cate)
                                                <option value="{{$cate->id}}"{{ isset($course)?($course->category==$cate->id?'selected':''):''}}>{{$cate->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Select Sub Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="subcategoryData" name="subcategory">
                                          @if(isset($course))
                                          <option value="{{$course->subcategory}}">
                                              {{$course->subcategory?getCategory($course->subcategory)->title:''}}
                                          </option>
                                          @else
                                             <option value="" selected disabled>Select</option>
                                          @endif
                                        </select>
                                        <!-- <em class="text-danger">Sub Category not mandatory if you want you can choose. </em> -->
                                    </div>
                                </div>

                               <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Training Mode</label>
                                    <div class="col-md-10">
                                        <input type="checkbox" class="" name="class_mode" value="Classroom" {{ isset($course) && $course->class_mode == 'Classroom' ? 'checked' : '' }}> Classroom
                                       
                                        <input type="checkbox" name="online_mode" value="Online" {{ isset($course) && $course->online_mode == 'Online' ? 'checked' : '' }}> Online<br>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote" style="height:300px;"  placeholder="Enter description" name="description">{{isset($course)?$course->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                ---------}}      
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Duration</label>
                                    <div class="col-md-10">
                                    <input type="text" name="duration" class="form-control" value="{{isset($course)?$course->duration:old('duration')}}" placeholder="Enter  Course Duration. For Example: 6 Months">
                                    </div>
                                </div>

 
                             
                             
                                
                                 
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">

                                            <option value="active" {{ isset($course)?($course->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($course)?($course->status=='inactive'?'selected':''):''}}>Inactive</option>
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