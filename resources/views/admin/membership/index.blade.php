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
                    <li class="breadcrumb-item active"> {{$page_title}} List </li>
                </ol>
            </div>
            <h4 class="page-title"> {{$page_title}} List</h4>
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
                {{----
                <div class="col-2">
                    <a href="{{route('admin.membership.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
                --------}}
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Reg No</th>
                    <th>Reg Date</th>
                    <th>Detail</th>
                     <th>Fee</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($membership as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$enq->name}}</td>
                        <td>{{$enq->id}}</td>
                        <td>{{show_date($enq->created_at)}}</td>
                        <td> {{$enq->email}} <br/>
                            <span class="text-sm">
                               <b>Phone:</b> {{$enq->phone}}        
                            </span>
                        </td>
                       
                        <td>
                            <span class="btn-xs btn-success text-uppercase">
                              {{$enq->membership_fee}}
                            </span>
                        </td>
                       
                        <td>
                         @if($enq->status==1)
                            <span class='btn btn-success btn-xs'>Active</span>
                         @else
                             <span class='btn btn-danger btn-xs'>Pending</span>
                               
                         @endif
                        </td>
                      
                        <td>
                            
                            <a href="{{url('admin/membership-edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
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