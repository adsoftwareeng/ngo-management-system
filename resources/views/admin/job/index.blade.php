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
                <div class="col-2">
                    <a href="{{route('admin.job.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
            </div>
            <table id="datatable-buttons" class="display table table-striped table-bordered">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Key Skills</th>
                     <th>Experience</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($job as $key => $enq)
                    <tr  style="width:100%;">
                        <td style="width:5%;">{{++$key}}</td>
                        <td style="width:12%;">
                            {{substr($enq->title,0,35)}} <Br/>
                          <span>
                              Job Type: {{$enq->job_type}}<br/>
                              No of Position: {{$enq->no_of_position}}
                          </span>
                        </td>
                        <td  style="width:11%;">{{$enq->skills}}</td>
                        <td style="width:10%;">{{$enq->experience}}</td>
                        <td  style="width:12%;">{{$enq->location}}<Br/>
                        <span>
                            Last date for apply : {{$enq->last_date_to_apply}}
                        </span>
                        </td>
                        <td style="width:10%;">
                         @if($enq->status=='inactive')
                                <span class='btn btn-danger btn-xs'>Inactive</span>
                         @else
                                <span class='btn btn-success btn-xs'>Active</span>
                         @endif
                        </td>
                        <td style="width:10%;">{{show_date($enq->created_at)}}</td>
                        <td style="width:10%;">
                            <a href="{{url('admin/job/edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
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