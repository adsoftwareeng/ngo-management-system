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
                    <a href="{{route($go_back_url)}}" class="btn btn-info btn-xs"> <i class="fa fa-arrow-left"></i> 
                        Go Back
                    </a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form class="form-horizontal" action="{{ route('admin.cases.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="id" value="{{isset($cases)?$cases->id:''}}">
                               
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Case Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="{{isset($cases)?$cases->title:old('title')}}" placeholder="Enter title">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($cases)?asset('public/uploads/cases/'.$cases->image):''}}" class="img-responsive w-25">
                                    </div>
                                </div>
                                
                                

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Case Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control  selectedType" name="type">
                                            <option value="" select disabled>Case Type</option>
                                            <option value="current" {{ isset($cases)?($cases->type=='current'?'selected':''):''}}>Current Case</option>
                                            <option value="success"{{ isset($cases)?($cases->type=='success'?'selected':''):''}}>Success Case</option>
                                        </select>
                                       
                                    </div>
                                </div>

                               <!---->
                               						
						<div class="form-group row currentBox d-none">
							<label class="col-sm-12 col-md-2 col-form-label"> Donation URL</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="donation_url" placeholder="URL"  type="text" value="{{isset($cases)?$cases->donation_url:old('donation_url')}}">
								<span id="code_span" class="text-danger font-weight-bold"></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label"> Beneficiary Form (PDF) </label>
							<div class="col-sm-12 col-md-6">
								<input class="form-control" name="beneficiary_form" placeholder="Image" accept=".pdf" type="file" id="branch_code" >
								<span id="code_span" class="text-danger font-weight-bold"></span>
							</div>
							 <div class="col-md-4">
                                <a href="{{isset($cases)?asset('public/uploads/cases/'.$cases->beneficiary_form):''}}">
                                    View
                                </a>
                            </div>
						</div>
						
						<div class="form-group row successBox d-none">
							<label class="col-sm-12 col-md-2 col-form-label"> Discharge Summary (PDF) </label>
							<div class="col-sm-12 col-md-6">
								<input class="form-control" name="discharge_summny" placeholder="Image" accept=".pdf" type="file" id="branch_code" >
								<span id="code_span" class="text-danger font-weight-bold"></span>
							</div>
							 <div class="col-md-4">
                                <a href="{{isset($cases)?asset('public/uploads/cases/'.$cases->discharge_summny):''}}">
                                    View
                                </a>
                            </div>
						</div>
						
							
						<div class="form-group row successBox d-none">
							<label class="col-sm-12 col-md-2 col-form-label"> Video URL </label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="video_url" placeholder="video URL"  type="text"  value="{{isset($cases)?$cases->video_url:old('video_url')}}" >
							
							</div>
							
						</div>
                               <!---->
                                
                                <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote" style="height:300px;"  placeholder="Enter description" name="description">{{isset($cases)?$cases->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">

                                            <option value="active" {{ isset($cases)?($cases->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($cases)?($cases->status=='inactive'?'selected':''):''}}>Inactive</option>
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


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script>
      $(document).ready(function () {
            $(".selectedType").on('change',function () {
                var selectedType = $(this).val();
                // console.log(selectedType);
                if(selectedType == 'current'){
                    $('.currentBox').removeClass('d-none');
                    $('.successBox').addClass('d-none');
                }else{
                    
                    $('.currentBox').addClass('d-none');
                    $('.successBox').removeClass('d-none');
                }
                
            }).change();
        });
    </script> 
@endsection