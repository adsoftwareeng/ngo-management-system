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
                                <div class="card-box">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded width-md waves-effect waves-light float-right">Add Files</button>
                                    <h4 class="header-title mb-0 pb-2">My Files</h4>

                                    <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/pdf.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/bmp.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/psd.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/avi.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/cad.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/txt.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/eps.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/dll.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/sql.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/zip.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/ps.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-sm-6">
                                            <div class="file-man-box rounded mt-3">
                                                <a href="" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                                <div class="file-img-box">
                                                    <img src="assets/images/file_icons/png.svg" alt="icon">
                                                </div>
                                                <a href="#" class="file-download"><i class="mdi mdi-download"></i> </a>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                                    <p class="mb-0"><small>568.8 kb</small></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-title"> {{$page_title}} List </h4>
                </div>
                <div class="col-2">
                    <a href="{{route('admin.gallery.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($gallery as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$enq->title}}</td>
                        <td class="w-25"><img src="{{asset('public/uploads/gallery/'.$enq->image)}}" class="w-25 img-responsive"></td>
                        <td>
                         @if($enq->type=='image')
                                Gallery
                         @else
                              Press Release
                         @endif
                        </td>
                        <td>
                         @if($enq->status=='inactive')
                                <span class='btn btn-danger btn-xs'>Inactive</span>
                         @else
                                <span class='btn btn-success btn-xs'>Active</span>
                         @endif
                        </td>
                        <td>{{show_date($enq->created_at)}}</td>
                        <td>
                            <a href="{{url('admin/gallery/edit/'.$enq->id)}}" class="btn btn-xs bg-primary text-white">
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