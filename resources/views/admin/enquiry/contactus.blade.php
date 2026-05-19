@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{generalSetting()->site_name}}</a></li>
                    <li class="breadcrumb-item active"> {{$page_title}}  </li>
                </ol>
            </div>
            <h4 class="page-title"> {{$page_title}}</h4>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($enquiry as $key => $enq)
                    <tr style="width:100%;">
                        <td style="width:10%;">{{++$key}}</td>
                        <td style="width:15%;">{{$enq->name}}</td>
                        <td style="width:15%;">{{$enq->email}}</td>
                        <td style="width:15%;">{{$enq->phone}}</td>
                        {{---------
                        <td style="width:15%;">{{$enq->course}}</td>
                        <td style="width:15%;">{{$enq->trainingmode}}</td>
                        -------}}
                        <td style="width:20%;">{{ substr($enq->message,0,30)}}</td>
                        <td style="width:15%;">{{show_date($enq->created_at)}}</td>
                        <td style="width:10%;">
                            <a href="#" data-toggle="modal" data-target=".viewContact{{$enq->id}}" class="btn btn-xs bg-info text-white"><i class="fa fa-eye"></i></a>
                             <!------------- View Contact--------------------->
                     <!--  Modal content for the above example -->
                                    <div class="modal fade viewContact{{$enq->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myLargeModalLabel">Enquiry From : {{$enq->name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Name: {{$enq->name}}</p>
                                                    <p>Email: {{$enq->email}}</p>
                                                    <p>Phone: {{$enq->phone}}</p>
                                                    {{------------
                                                    <p>Course: {{$enq->course}}</p>
                                                    <p>Training Mode: {{$enq->trainingmode}}</p>
                                                    ---------}}
                                                    <p>Message:  {!! nl2br(e($enq->message)) !!}
                                                    </p>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                    <!------------ end contact ----------------------->
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