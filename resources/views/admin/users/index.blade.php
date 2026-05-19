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
                    <a href="{{route('admin.users.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
                --------}}
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Member Name</th>
                    <th>Reg No</th>
                   
                    @if($type=='list')
                     <th>Reg Date</th>
                    <th>Email</th>
                    <th>Status</th>
                    @elseif($type=='certificate')
                    
                     <th>Verify Date</th>
                     
                    <th>Email</th>
                     <th>certificate</th>
                    @else
                     <th>Reg Date</th>
                     <th>View Appointment</th>
                     <th>View ID </th>
                    @endif
                    @if($type=='certificate')
                    @else
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                 @foreach($users as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$enq->name}}</td>
                        <td>{{$enq->id}}</td>
                       
                        @if($type=='list')
                         <td>{{show_date($enq->created_at)}}</td>
                         <td> {{$enq->email}} </td>
                        <td>
                         @if($enq->status==1)
                            <span class='btn btn-success btn-xs'>Active</span>
                         @else
                             <span class='btn btn-danger btn-xs'>Pending</span>
                               
                         @endif
                        </td>
                        @elseif($type=='certificate')
                         <td> {{$enq->verification_date}} </td>
                         <td> {{$enq->email}} </td>
                         <td> 
                            <a href="{{ route('admin.certificate', ['id' => $enq->id]) }}"   class="btn bt-xs btn-success">
                               Generate 
                            </a>
                        </td> 
                       @else
                       
                       <td>{{show_date($enq->created_at)}}</td>
                       <td>
                           <a href="{{ route('admin.users.letter', ['type' => 'appointment-letter', 'id' => $enq->id]) }}"  class="btn bt-xs btn-success" target="_blank">    
                               Appointment Letter
                           </a>
                       </td>
                       <td> 
                            <a href="{{ route('admin.users.letter', ['type' => 'id-card', 'id' => $enq->id]) }}"  target="_blank" class="btn bt-xs btn-success">
                                Id Card 
                            </a>
                        </td>
                       @endif
                       @if($type=='certificate')
                       @else
                        <td>
                        @if($enq->status==1)
                       
                           <a href="{{ route('admin.user.qrcode.download', $enq->id) }}" class="btn  btn-xs btn-primary">
                                Generate QR
                            </a>
                            |
                       @endif
                            <a href="{{url('admin/users-edit/'.$enq->id)}}" class="btn btn-xs bg-success text-white">
                                <i class="fa fa-eye"></i>
                            </a> |
                            
                            <a href="{{url('admin/users-edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
                                <i class="fa fa-edit"></i>
                            </a> |
                            <a href="#" class="btn btn-xs delete-btn bg-danger text-white" data-id="{{ $enq->id }}">
                                <i class="fa fa-trash"></i>
                            </a> 
                        </td>
                      @endif
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->
@endsection