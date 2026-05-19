@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{generalSetting()->site_name}}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"> Enquiry</a></li>
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
                 <form class="form-horizontal" action="{{ route('admin.enquiry_store')}}" method="post" id="addForm">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($enquiry)?$enquiry->id:''}}">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Booking Date</label>
                                    <div class="col-md-10">
                                        <input type="text" name="booking_date" id="simpleinput" class="form-control" value="{{isset($enquiry)?$enquiry->booking_date:old('booking_date')}}" placeholder="Enter Booking Date">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($enquiry)?$enquiry->name:old('name')}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                    <div class="col-md-10">
                                     <input type="email" id="example-email" name="email" class="form-control" value="{{isset($enquiry)?$enquiry->email:old('email')}}" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-email">Phone</label>
                                    <div class="col-md-10">
                                    <input type="text"   id="example-email" name="phone" class="form-control" value="{{isset($enquiry)?$enquiry->phone:old('phone')}}" placeholder="Enter Phone"  minlength="10" maxlength="10"> 
                                    </div>
                                </div>
                                @if(!empty(ourServices(1)) && count(ourServices(1))>0)
                               <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Service</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="service">
                                          <option value="" selected disabled>Choose Service</option>
                                            @foreach(ourServices(1) as $serviceOur)
                                              <option value="{{$serviceOur->id}}" {{ isset($enquiry)?($enquiry->service==$serviceOur->id?'selected':''):''}}>{{$serviceOur->title}}</option>
                                              @endforeach
                                      </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Person</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="number" id="adults" value="{{isset($enquiry)?$enquiry->adults:old('adults')}}" placeholder="Enter Person" name="adults">
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="" select disabled>Select</option>
                                            <option value="pending"{{ isset($enquiry)?($enquiry->status=='pending'?'selected':''):''}}>Pending</option>
                                            <option value="complete" {{ isset($enquiry)?($enquiry->status=='complete'?'selected':''):''}}>Complete</option>
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