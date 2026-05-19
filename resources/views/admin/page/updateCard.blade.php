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
                    <input type="hidden" name="type" value="{{isset($page)?$page->type:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Subject</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($page)?$page->title:old('title')}}" placeholder="Enter Subject">
                                    </div>
                                </div>
                              
                                 @if($page->type=='appointment-letter')
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput"> Director Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url"  class="form-control" value="{{isset($page)?$page->url:old('url')}}" placeholder="Enter Director Name  ">
                                    </div>
                                </div>
                             
                                 <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email"> Director Signature</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($page)?asset('public/uploads/page/'.$page->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                 @endif

                              <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">
                                       {{$page->type=='appointment-letter'?'Address':'Title'}}
                                         
                                   </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter Address" name="summary">{{isset($page)?$page->summary:old('summary')}}</textarea>
                                    </div>
                                </div>
                             
                                  <div class="form-group row">
                                     <label class="col-md-2 col-form-label" for="example-range">
                                        Description
                                    </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote " style="height:100px" placeholder="Enter " name="description">{{isset($page)?$page->description:old('description')}}</textarea>
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