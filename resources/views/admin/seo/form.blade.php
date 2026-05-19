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
                   
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form class="form-horizontal" action="{{ route('admin.seo.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($seo)?$seo->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Page Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="page_title" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->page_title:old('page_title')}}" placeholder="Enter Page Title">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">Keywords</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter keywords" name="keywords">{{isset($seo)?$seo->keywords:old('keywords')}}</textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter description" name="description">{{isset($seo)?$seo->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Author</label>
                                    <div class="col-md-10">
                                    <input type="text" name="author" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->author:old('author')}}" placeholder="Enter  author">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">DNS Prefetch</label>
                                    <div class="col-md-10">
                                    <input type="text" name="dns_prefetch" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->dns_prefetch:old('dns_prefetch')}}" placeholder="Enter  DNS Prefetch">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Preconnect</label>
                                    <div class="col-md-10">
                                    <input type="text" name="preconnect" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->preconnect:old('preconnect')}}" placeholder="Enter  preconnect">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Canonical</label>
                                    <div class="col-md-10">
                                    <input type="text" name="canonical" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->canonical:old('canonical')}}" placeholder="Enter  canonical">
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Og Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="og_title" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->og_title:old('og_title')}}" placeholder="Enter  OG Title">
                                    </div>
                                </div>
                                
                             
                                
                                
                                
                                  <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">OG Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="og_image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($seo)?asset('public/uploads/seo/'.$seo->og_image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>

                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">OG Image Width</label>
                                    <div class="col-md-10">
                                    <input type="number" name="og_image_width" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->og_image_width:old('og_image_width')}}" placeholder="Enter  Width">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">OG Image Hight</label>
                                    <div class="col-md-10">
                                    <input type="number" name="og_image_height" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->og_image_height:old('og_image_height')}}" placeholder="Enter Height">
                                    </div>
                                </div>
                                  

                                
                             
                                
                                
                              <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">OG description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter summary" name="og_description">{{isset($seo)?$seo->og_description:old('og_description')}}</textarea>
                                    </div>
                                </div>
                             
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">OG URL</label>
                                    <div class="col-md-10">
                                    <input type="url" name="og_url" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->og_url:old('og_url')}}" placeholder="Enter  URL">
                                    </div>
                                </div>
                                
                                 
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">OG Site Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="og_site_name" id="simpleinput" class="form-control" value="{{isset($seo)?$seo->og_site_name:old('og_site_name')}}" placeholder="Enter Site Name">
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