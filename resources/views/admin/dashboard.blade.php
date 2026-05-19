@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{generalSetting()->site_name}}</a></li>

                    <li class="breadcrumb-item active"> Dashboard </li>
                </ol>
            </div>
            <h4 class="page-title"> Dashboard</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
    <div class="row">

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-account-multiple  avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Enquiry</p>
                        <h3 class="font-weight-medium my-2">$ <span data-plugin="counterup">{{$enquiry_total}}</span></h3>
                        <p class="m-0"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom ">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-image avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Slider</p>
                        <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{$slider_total}}</span></h3>
                        <p class="m-0"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom ">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Projects</p>
                        <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$service_total}}</span></h3>
                        <p class="m-0"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom ">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Gallery</p>
                        <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$gallery_total}}</span></h3>
                        <p class="m-0"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->    

   @if(count($enquiry_list)>0)
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Recent Enquiry</h4>
                

                <div class="table-responsive">
                    <table class="table table-hover m-0 table-actions-bar">

                        <thead>
                            <tr>
                                   <th>S.No.</th>
                                    <th>Booking Date</th>
                                    <th>Name</th>
                                    <th>Email/Phone No</th>
                                    <th>Service</th>
                                    <th>Person</th>
                                    <th>Date</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($enquiry_list as $enqList)
                    <tr>
                        <td>1</td>
                        <td>{{$enqList->booking_date}}</td>
                        <td>{{$enqList->name}}</td>
                        <td>
                            {{$enqList->email}} <Br/>
                            <span class="text-sm" style="font-size:11px;"><b>Phone:</b> {{$enqList->phone}}</span>
                        </td>
                        <td>{{getService($enqList->service)->title}}</td>
                        <td>
                            {{$enqList->adults}} 
                        </td>
                       
                        <td>{{show_date($enqList->created_at)}}</td>
                        <td>
                            <a href="#" class="btn btn-xs delete-btn bg-danger text-white" data-id="{{ $enqList->id }}">
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
        <!-- end col -->
    </div>
    @endif
    <!--- end row -->
        <!-- END wrapper -->    
@endsection