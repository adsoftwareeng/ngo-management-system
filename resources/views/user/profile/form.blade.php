@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-name"> {{$page_title}}  </h4>
                </div>
            
            </div>
          <!-- Form -->
          <hr/>
        <div class="row">
        <div class="col-12">
                 <form  action="{{ route('user.profile.store')}}" method="post"    enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($profile)?$profile->id:''}}">

                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Profile Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($profile)?asset('public/uploads/users/'.$profile->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($profile)?$profile->name:old('name')}}" placeholder="Enter Name">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Father's Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="father_name" id="simpleinput" class="form-control" value="{{isset($profile)?$profile->father_name:old('father_name')}}" placeholder="Enter Father's Name">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Date of Birth</label>
                                    <div class="col-md-10">
                                    <input type="date" name="dob" id="simpleinput" class="form-control" value="{{isset($profile)?$profile->dob:old('dob')}}" placeholder="Enter Date of birth">
                                    </div>
                                </div>
                             
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Email</label>
                                    <div class="col-md-10">
                                    <input type="email" readonly id="simpleinput" class="form-control" value="{{isset($profile)?$profile->email:old('email')}}" placeholder="Enter Email">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Phone</label>
                                    <div class="col-md-10">
                                    <input type="text" name="phone" id="simpleinput" class="form-control" value="{{isset($profile)?$profile->phone:old('phone')}}" placeholder="Enter Phone">
                                    </div>
                                </div>

                                
                              <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Designation</label>
                                    <div class="col-md-10">
                                    <input type="text" name="designation" id="simpleinput" class="form-control" value="{{isset($profile)?$profile->designation:old('designation')}}" placeholder="Enter Designation">
                                    </div>
                                </div>
                             
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput"> 
                                        Aadhaar No
                                    </label>
                                    <div class="col-md-10">
                                    <input type="text" name="aadhar_no" id="simpleinput" class="form-control" value="{{isset($profile)?$profile->aadhar_no:old('aadhar_no')}}" placeholder="Enter aadhar no">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">City </label>
                                    <div class="col-md-10">
                                    <input type="text" name="city"  class="form-control" value="{{isset($profile)?$profile->city:old('city')}}" placeholder="Enter  City">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">
                                        Address
                                   </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter Address" name="address">{{isset($profile)?$profile->address:old('address')}}</textarea>
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