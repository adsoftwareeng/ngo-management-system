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
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Applicant</th>
                    <th>Apply For</th>
                    <th>Applied Position </th> 
                    <th>Expected Salary</th>
                    <th>Resume</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    
                 @foreach($job as $key => $enq)
                 
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            {{$enq->name}} <Br/>
                          <span>
                              Email: {{$enq->email}}<br/>
                              Phone: {{$enq->phone}}
                          </span>
                        </td>
                        <td>{{$enq->job->title}}</td>
                        <td>
                             {{$enq->position_apply}}
                        </td>
                        <td>{{$enq->salary_expected}}</td>
                        <td>
                            <a href="{{asset('public/uploads/career/'.$enq->resume)}}" class="btn btn-info" target="_blank">
                                View
                            </a>
                        </td>
                        <td>{{show_date($enq->created_at)}}</td>
                        <td>
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