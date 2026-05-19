@extends('layouts.master')
@section('content')

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
                <form class="form-horizontal" action="{{ route('admin.membership.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($users)?$users->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($users)?$users->name:old('name')}}" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Father`s Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="father_name" id="simpleinput" class="form-control" value="{{isset($users)?$users->father_name:old('father_name')}}" placeholder="Enter Father`s name">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Date of birth</label>
                                    <div class="col-md-10">
                                    <input type="date" name="dob" id="simpleinput" class="form-control" value="{{isset($users)?$users->dob:old('dob')}}" placeholder="Enter Date of Birth">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Mobile No</label>
                                    <div class="col-md-10">
                                    <input type="number" name="phone"  class="form-control" value="{{isset($users)?$users->phone:old('phone')}}" placeholder="Enter phone no">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Email </label>
                                    <div class="col-md-10">
                                    <input type="email" name="email" readonly class="form-control" value="{{isset($users)?$users->email:old('email')}}" placeholder="Enter email">
                                    </div>
                                </div>


                                
                              
                               @if(!empty($designation) && count($designation)>0)
                              <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range"> Designation </label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="designation">
                                            <option value="" selected disabled>Choose designation</option>
                                             @foreach($designation as $ser)
                                                <option value="{{$ser->id}}" {{ isset($users)?($users->designation==$ser->id?'selected':''):''}}>{{$ser->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            
                                
                              <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Aadhaar Card No</label>
                                    <div class="col-md-10">
                                    <input type="text" name="aadhar_no" class="form-control" value="{{isset($users)?$users->aadhar_no:old('aadhar_no')}}">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Address </label>
                                    <div class="col-md-10">
                                    <textarea  name="address"  class="form-control">{{isset($users)?$users->address:old('address')}}</textarea>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">District</label>
                                    <div class="col-md-10">
                                    <input type="text" name="city" class="form-control" value="{{isset($users)?$users->city:old('city')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label">Profile Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    @if(!empty($users->image))
                                    <div class="col-md-4">
                                        <img src="{{isset($users)?asset('public/uploads/users/'.$users->image):''}}" class="img-responsive w-25">
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Fees</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="membership_fee">
                                            <option value="unpaid"{{ isset($users)?($users->membership_fee=='unpaid'?'selected':''):''}}>Unpaid</option>
                                            <option value="paid" {{ isset($users)?($users->membership_fee=='paid'?'selected':''):''}}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            <option value="1" {{ isset($users)?($users->status==1?'selected':''):''}}>Active</option>
                                             <option value="2" {{ isset($users)?($users->status==2?'selected':''):''}}>Pending</option>
                                              <option value="0"{{ isset($users)?($users->status==0?'selected':''):''}}>Cancel</option>
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