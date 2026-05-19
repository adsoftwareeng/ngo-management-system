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
                    <h4 class="header-title"> {{$page_title}} List </h4>
                </div>
                <div class="col-2">
                    <a href="{{route('admin.activity.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Image/Video</th>
                    <th>City</th>
                    <th>Stat - End Date</th>
                    <th>Type</th>
                    <th>Status</th>
                    <!--<th>Date</th>-->
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($activity as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            <h5 style="width:120px; overflow-x:scroll">
                                {{$enq->name}}
                                
                            </h5>
                            <h6><b>Location: </b> {{$enq->location}}</h6>
                        </td>
                        <td>
                           @if($enq->type=='image')
                              <img 
                                src="{{asset('public/uploads/activity/'.$enq->image)}}" 
                              class="img-responsive w-100">
                            @else
                              <div class="embed-responsive embed-responsive-1by1">
                                  <iframe class="embed-responsive-item" src="{{$enq->image}}"></iframe>
                              </div>
                            @endif
                        </td>
                        <td>{{$enq->city}}</td>
                        
                        <td>{{$enq->start_date}} <Br/>- {{$enq->end_date}}</td>
                  
                        <td>{{$enq->type}}</td>
                  
                        <td>
                         @if($enq->status=='inactive')
                                <span class='btn btn-danger btn-xs'>Inactive</span>
                         @else
                                <span class='btn btn-success btn-xs'>Active</span>
                         @endif
                        </td>
                        <!--<td>{{------show_date($enq->created_at)---}}</td>-->
                        <!--<td></td>-->
                        <td>
                          
                            <a href="{{url('admin/activity/edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
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
    </div>
</div>
<!-- end row -->
@endsection