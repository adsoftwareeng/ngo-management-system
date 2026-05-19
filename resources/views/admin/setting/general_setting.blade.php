@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{generalSetting()->site_name}}</a></li>
                    
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
              
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form class="form-horizontal" action="{{ route('admin.general.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($general)?$general->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Site Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="site_name" id="simpleinput" class="form-control" value="{{isset($general)?$general->site_name:old('site_name')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Site URL</label>
                                    <div class="col-md-10">
                                    <input type="text" name="site_url" id="simpleinput" class="form-control" value="{{isset($general)?$general->site_url:old('site_url')}}" placeholder="Enter URL">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Site Registration no</label>
                                    <div class="col-md-10">
                                    <input type="text" name="reg_no" id="simpleinput" class="form-control" value="{{isset($general)?$general->reg_no:old('reg_no')}}" placeholder="Enter reg_no">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Header Logo <span class="text-info">(Size: 112 X 71)</span></label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="logo" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($general)?asset('public/uploads/general/'.$general->logo):''}}" class="img-responsive w-25">
                                    </div>
                                </div>

                                  <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Footer Logo  <span class="text-info">(Size: 112 X 71)</span></label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="logo_2" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($general)?asset('public/uploads/general/'.$general->logo_2):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                              

                             <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Favicon </label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="favicon" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($general)?asset('public/uploads/general/'.$general->favicon):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Site Phone </label>
                                    <div class="col-md-10">
                                    <input type="text" maxlength="10" name="phone" class="form-control" value="{{isset($general)?$general->phone:old('phone')}}" placeholder="Enter phone"> 
                                    </div>
                                </div>
                              

                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Site Email </label>
                                    <div class="col-md-10">
                                    <input type="email" name="email" class="form-control" value="{{isset($general)?$general->email:old('email')}}" placeholder="Enter email"> 
                                    </div>
                                </div>
                              

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Site Address </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" placeholder="Enter Address" name="address">{{isset($general)?$general->address:old('address')}}</textarea>
                                    </div>
                                </div>

                                 <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Facebook Link </label>
                                    <div class="col-md-10">
                                    <input type="text" name="fb" class="form-control" value="{{isset($general)?$general->fb:old('fb')}}" placeholder="Enter fb"> 
                                    </div>
                                </div>

                                 <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Linkedin Link </label>
                                    <div class="col-md-10">
                                    <input type="text" name="linkedin" class="form-control" value="{{isset($general)?$general->linkedin:old('linkedin')}}" placeholder="Enter Linkedin"> 
                                    </div>
                                </div>

                                 <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Instagram Link </label>
                                    <div class="col-md-10">
                                    <input type="text" name="instagram" class="form-control" value="{{isset($general)?$general->instagram:old('instagram')}}" placeholder="Enter instagram"> 
                                    </div>
                                </div>


                                 <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Twitter Link </label>
                                    <div class="col-md-10">
                                    <input type="text" name="twitter" class="form-control" value="{{isset($general)?$general->twitter:old('twitter')}}" placeholder="Enter twitter"> 
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Footer Note </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" placeholder="Enter Home Note" name="call_note">{{isset($general)?$general->call_note:old('call_note')}}</textarea>
                                    </div>
                                </div>
                                {{--------
                                 <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Appointment Image </label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="appointment_img" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($general)?asset('public/uploads/general/'.$general->appointment_img):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                --}}
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Breadcrumbs Image </label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="breadcrumbs" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($general)?asset('public/uploads/general/'.$general->breadcrumbs):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                    
                                 <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email"> Whatsapp Number</label>
                                    <div class="col-md-10">
                                    <input type="text" name="whatsapp_number" class="form-control" value="{{isset($general)?$general->whatsapp_number:old('whatsapp_number')}}" placeholder="Enter Whatsapp Number"> 
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="example-email">   Monday - Saturday Timing </label>
                                    <div class="col-md-10">
                                    <input type="text" name="mon_sat_time" class="form-control" value="{{isset($general)?$general->mon_sat_time:old('mon_sat_time')}}" placeholder="Enter Hours"> 
                                    </div>
                                </div>
                               
                                 <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="example-email">Sunday Timing  </label>
                                    <div class="col-md-10">
                                    <input type="text" name="sat_sun_time" class="form-control" value="{{isset($general)?$general->sat_sun_time:old('sat_sun_time')}}" placeholder="Enter Hours"> 
                                    </div>
                                </div>
                              
                                
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email">Footer About Us Content  </label>
                                    <div class="col-md-10">
                                    <input type="text" name="footer_about" class="form-control" value="{{isset($general)?$general->footer_about:old('footer_about')}}" placeholder="Enter About Us Content Footer"> 
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-email">Copyright </label>
                                    <div class="col-md-10">
                                    <input type="text" name="copyright" class="form-control" value="{{isset($general)?$general->copyright:old('copyright')}}" placeholder="Enter copyright"> 
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