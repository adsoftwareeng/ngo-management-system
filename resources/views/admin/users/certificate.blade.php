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
                    <a href="{{url('admin/users-card/certificate')}}" class="btn btn-info btn-xs"> <i class="fa fa-arrow-left"></i> 
                        Go Back
                    </a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                <form class="form-horizontal" action="{{ route('admin.certificate.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                                <input type="hidden" name="user_id" value="{{isset($users)?$users->id:''}}">
                                     
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name"  class="form-control" value="{{isset($users)?$users->name:old('name')}}" placeholder="Enter title" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Father`s Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="father_name"  class="form-control" value="{{isset($users)?$users->father_name:old('father_name')}}" placeholder="Enter Father`s name" readonly>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Certificate Number</label>
                                    <div class="col-md-10">
                                    <input type="text" name="certificate_number"  class="form-control" value="{{time().'/'.$users->id.'/'.date('y')}}" placeholder="Enter certificate number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Enter Program</label>
                                    <div class="col-md-10">
                                    <textarea  name="program" class="form-control" placeholder="Enter Program"></textarea>
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