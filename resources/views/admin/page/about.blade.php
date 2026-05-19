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
                    <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> GO Back</a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form  action="{{ route('admin.page.store')}}" method="post"    enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($page)?$page->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title/Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($page)?$page->title:old('title')}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                 <input type="hidden" name="type" value="{{$type}}">
                                 
                                  <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($page)?asset('public/uploads/page/'.$page->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>

                                
                                
                              <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">
                                       Summary
                                   </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter summary" name="summary">{{isset($page)?$page->summary:old('summary')}}</textarea>
                                    </div>
                                </div>
                             
                                  <div class="form-group row">
                                     <label class="col-md-2 col-form-label" for="example-range">Description
                                    </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote"  placeholder="Enter " name="description">{{isset($page)?$page->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Video URL</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url"  class="form-control" value="{{isset($page)?$page->url:old('url')}}" placeholder="Enter  URL">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Video URL 2</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url2"  class="form-control" value="{{isset($page)?$page->url2:old('url2')}}" placeholder="Enter  URL2">
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