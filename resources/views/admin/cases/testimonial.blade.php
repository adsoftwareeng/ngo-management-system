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
                <div class="col-9">
                    <h4 class="header-title"> {{$page_title}} List </h4>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fa fa-plus"></i> Add 
                        Testimonial
                    </a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($testimonial as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$enq->name}}</td>
                        <td class="w-25"><img src="{{asset('public/uploads/testimonials/'.$enq->image)}}" class="w-25 img-responsive"></td>
                        <td>
                         @if($enq->status=='inactive')
                                <span class='btn btn-danger btn-xs'>Inactive</span>
                         @else
                                <span class='btn btn-success btn-xs'>Active</span>
                         @endif
                        </td>
                        <td>{{show_date($enq->created_at)}}</td>
                        <td>
                            <a href="#" class="btn btn-xs bg-primary text-white" data-toggle="modal" data-target="#exampleModalLong{{$enq->id}}">
                                <i class="fa fa-edit"></i>
                            </a> |
                            <a href="#" class="btn btn-xs delete-btn bg-danger text-white" data-id="{{ $enq->id }}">
                                <i class="fa fa-trash"></i>
                            </a> 
                            
                            
<!---- testimonial ----->
<div class="modal fade" id="exampleModalLong{{$enq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('admin.testimonials.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                       
                     <input type="hidden" name="type" value="success">
                     <input type="hidden" name="case_id" value="{{$case_id}}">
                    <input type="hidden" name="id" value="{{isset($enq)?$enq->id:''}}">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control" value="{{isset($enq)?$enq->name:old('name')}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{isset($enq)?asset('public/uploads/testimonials/'.$enq->image):''}}" class="img-responsive w-50">
                                    </div>
                                </div>
                              
                              
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Designation</label>
                                    <div class="col-md-10">
                                        <input type="text" name="designation" class="form-control" value="{{isset($enq)?$enq->designation:old('designation')}}" placeholder="Designation">
                                       
                                    </div>
                                </div>
                                
                                  
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" placeholder="Enter description" name="description">{{isset($enq)?$enq->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                          
                                            <option value="active" {{ isset($enq)?($enq->status=='active'?'selected':''):''}}>Active</option>
                                              <option value="inactive"{{ isset($enq)?($enq->status=='inactive'?'selected':''):''}}>Inactive</option>
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
      </div>
      
    </div>
  </div>
</div>
<!---- end testimonial -->
                        </td>
                    </tr>
                    
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->


<!---- testimonial ----->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="{{ route('admin.testimonials.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                     <input type="hidden" name="type" value="success">
                     <input type="hidden" name="case_id" value="{{$case_id}}">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" id="simpleinput" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                </div>
                              
                              
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Designation</label>
                                    <div class="col-md-10">
                                        <input type="text" name="designation" class="form-control" value="{{isset($testimonials)?$testimonials->designation:old('designation')}}" placeholder="Designation">
                                       
                                    </div>
                                </div>
                                
                                  
                                  <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" placeholder="Enter description" name="description">{{isset($testimonials)?$testimonials->description:old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                          
                                            <option value="active" {{ isset($testimonials)?($testimonials->status=='active'?'selected':''):''}}>Active</option>
                                              <option value="inactive"{{ isset($testimonials)?($testimonials->status=='inactive'?'selected':''):''}}>Inactive</option>
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
      </div>
      
    </div>
  </div>
</div>
<!---- end testimonial -->
@endsection