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
                 <form class="form-horizontal" action="{{ route('admin.award.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($award)?$award->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($award)?$award->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($award)?asset('public/uploads/award/'.$award->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                {{------
                               @if(!empty($service))
                              <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Service </label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="service_id">
                                            <option value="" selected disabled>Choose Service</option>
                                             @foreach($service as $ser)
                                                <option value="{{$ser->id}}" {{ isset($award)?($award->service_id==$ser->id?'selected':''):''}}>{{$ser->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                ------}} 
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="type">
                                            <option value="" selected disabled> Choose Type</option>
                                            <option value="certificate"{{ isset($award)?($award->type=='certificate'?'selected':''):''}}>Certificate</option>
                                            <option value="achievement" {{ isset($award)?($award->type=='achievement'?'selected':''):''}}>Achievement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="inactive"{{ isset($award)?($award->status=='inactive'?'selected':''):''}}>Inactive</option>
                                            <option value="active" {{ isset($award)?($award->status=='active'?'selected':''):''}}>Active</option>
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