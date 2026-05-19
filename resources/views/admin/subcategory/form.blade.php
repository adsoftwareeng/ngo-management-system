@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{generalSetting()->site_name}}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"> subcategory</a></li>
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
                 <form class="form-horizontal" action="{{ route('admin.subcategory_store')}}" method="post" id="addForm" enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($subcategory)?$subcategory->id:''}}">
                               
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Select Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category">
                                            <option value="" selected disabled>Select</option>
                                            @if(!empty($category) && count($category))
                                            @foreach($category as $cate)
                                            <option value="{{$cate->id}}"{{ isset($subcategory)?($subcategory->parent_id==$cate->id?'selected':''):''}}>{{$cate->title}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">subCategory Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($subcategory)?$subcategory->title:old('title')}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($subcategory)?asset('public/uploads/category/'.$subcategory->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                {{------------
                                  <div class="form-group row">
                                     <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote" style="height:300px;"  placeholder="Enter description" name="description" required>{{isset($subcategory)?$subcategory->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                  ---------}}     
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="" select disabled>Select</option>
                                            <option value="complete" {{ isset($subcategory)?($subcategory->status=='complete'?'selected':''):''}}>Active</option>
                                            <option value="pending"{{ isset($subcategory)?($subcategory->status=='pending'?'selected':''):''}}>Inactive</option>
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