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
                    <h4 class="header-title"> {{$page_title}}  </h4>
                </div>
                
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Page Title</th>
                    <th>Og Title</th>
                    <th>Og Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($seo as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{substr($enq->page_title,0,40)}}</marquee></td>
                        <td>{{substr($enq->og_title,0,40)}}</td>
                        <td class="w-25"><img src="{{asset('public/uploads/seo/'.$enq->og_image)}}" class="img-responsive w-25"></td>
                        <td>
                            <a href="{{url('admin/seo/edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
                                <i class="fa fa-edit"></i>
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