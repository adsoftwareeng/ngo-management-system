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
        <div class="card-box">
         
            <div class="row mb-2">
             <div class="col-8">
            <table id="datatable-buttons" class="table table-striped " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($gallery as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{asset('public/uploads/gallery/'.$enq->image)}}" style="width:100px; height:100px;"></td>
                        <td>
                         @if($enq->status=='inactive')
                                <span class='btn btn-danger btn-xs'>Inactive</span>
                         @else
                                <span class='btn btn-success btn-xs'>Active</span>
                         @endif
                        </td>
                        <td>{{show_date($enq->created_at)}}</td>
                        <td>
                            <a href="{{url('admin/partner/edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
                                <i class="fa fa-edit"></i>
                            </a> |
                            <a href="#" class="btn btn-xs delete-btn bg-danger text-white" data-id="{{ $enq->id }}">
                                <i class="fa fa-trash"></i>
                            </a> 
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
            </div>
            <div class="col-4">
                 
                 <form class="border border-1 p-3" action="{{ route('admin.partner.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                       <h4>{{$title}}</h4>
                       <hr/>
                    <input type="hidden" name="id" value="{{isset($partner)?$partner->id:''}}">
                               
                                <div class="form-group">
                              
                                          <label class="">Image</label><br/>
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    
                                </div>
                                
                                <div class="form-group ">
                                      <label >Status</label>
                                        <select class="form-control" name="status">

                                            <option value="active" {{ isset($partner)?($partner->status=='active'?'selected':''):''}}>Active</option>
                                            <option value="inactive"{{ isset($partner)?($partner->status=='inactive'?'selected':''):''}}>Inactive</option>
                                        </select>
                                </div>
                                  <div class="form-group row pull-center text-center">
                                    <div class="col-md-12">
                                        <button  type="submit" class="btn btn-primary w-100">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </form>
            </div>
              
            </div>
        </div>
    </div>
    
</div>
<!-- end row -->
@endsection