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
                    <a href="{{route('admin.cases.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Details</th>
                     <!--<th>Image</th>-->
                    
                    <th>Beneficiary Form</th> 
                    <th>Discharge Summny</th> 
                    <!--<th>Status</th>-->
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($cases as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        
                        <td>
                            <img src="{{asset('public/uploads/cases/'.$enq->image)}}" style="width:50px; height:50px;">
                            <br/>
                            {{ substr($enq->title,0,20)}}... <br/>
                            Type : {{$enq->type}} <br/>
                            Status : 
                            
                       @if($enq->status=='inactive')
                                <span class='text-danger'>Inactive</span>
                         @else
                                <span class='text-success'>Active</span>
                         @endif
                            <!--<marquee></marquee>-->
                        
                        </td>
                      
                        <!--<td></td>-->
                        
                        
                        <td>
                            @if(!empty($enq->beneficiary_form))
                            <a href="{{asset('public/uploads/cases/'.$enq->beneficiary_form)}}" target="blank" class="btn btn-info">
                                View
                            </a>
                            @else
                               --
                            @endif
                        </td>
                         
                        <td>
                            @if(!empty($enq->discharge_summny))
                            
                            <a href="{{asset('public/uploads/cases/'.$enq->discharge_summny)}}" target="blank" class="btn btn-info">
                                View
                            </a>
                            @else
                             -
                            @endif
                        </td>
                        <td>{{show_date($enq->created_at)}}</td>
                        <td>
                          @if($enq->type=='success')
                            <a href="{{url('admin/cases/testimonials/'.$enq->id)}}" class="btn btn-xs bg-info text-white">
                                <i class="fa fa-plus"></i> Testimonial
                            </a>
                            @endif
                            <br/>
                            <br/>
                            <a href="{{url('admin/cases/edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
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