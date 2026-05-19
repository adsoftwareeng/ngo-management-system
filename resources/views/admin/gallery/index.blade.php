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
                                      <a href="{{url('admin/gallery/add/'.$status)}}" class="btn btn-sm btn-primary btn-rounded width-md waves-effect waves-light float-right"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                                    <h4 class="header-title mb-0 pb-2">{{$page_title}} List</h4>
                                      @if(!empty($gallery) && count($gallery)>0)
                                    <div class="row">
                                      
                                         @foreach($gallery as $key => $enq)
                                        <div class="col-md-3">
                                            
                                            <div  class="file-man-box rounded mt-3 {{$enq->status=='inactive'? 'border border-danger' : ' '}} ">
                                                <a href="#" class="file-close delete-btn"  data-id="{{ $enq->id }}"><i class="mdi mdi-close-circle"></i></a>
                                                  <a href="#"  data-toggle="modal" data-target=".bd-edit-modal-sm-{{$enq->id}}" class="file-edit"><i class="fa fa-edit"></i> </a>
                                                <div class="file-img-box">
                                                    <img src="{{asset('public/uploads/gallery/'.$enq->image)}}" alt="icon" class="w-100 img-responsive" style="height:100px !important;">
                                                </div>
                                              
                                               
                                            </div>
                                        </div>
                                        
                                            <!----- edit modal--->
                                    <div class="modal fade bd-edit-modal-sm-{{$enq->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-md">
                                        <div class="modal-content">
          <form class="form-horizontal" action="{{ route('admin.gallery.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                               
      <div class="modal-header">
        <h5 class="modal-title">Update {{$status}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="hidden" name="id" value="{{$enq->id}}">

                                <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-9">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="example-email">Image Alt</label>
                                    <div class="col-md-9">
                                      <input type="text" value="{{$enq->alt}}" class="form-control" name="alt">
                                    </div>
                                </div>
                                
                                @if(!empty($album) && count($album)>0)
                               
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="example-range">Album</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="album_id">
                                            <option value="" selected disabled> Select Album </option>
                                      @foreach($album as $albums)
                                            <option value="{{$albums->id}}"{{ isset($enq)?($enq->album_id==$albums->id?'selected':''):''}}>{{$albums->title}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                               
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status">
                                            <option value="inactive"{{ isset($enq)?($enq->status=='inactive'?'selected':''):''}}>Inactive</option>
                                            <option value="active" {{ isset($enq)?($enq->status=='active'?'selected':''):''}}>Active</option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button  type="submit" class="btn btn-primary">
                                                                    Submit
                                                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
               </form>

                                        </div>
                                      </div>
                                    </div>
                                     <!----- edit modal--->
                                        @endforeach
                                       
                                    </div>
                                     <div class="row mt-3">
                                            <div class="col-md-12 text-center">
                         {{$gallery->links('vendor.pagination.bootstrap-5') }}
                                            </div>
                                     </div>
                                     @else
                                       <div class="row">
                                           <div class="col-md-4 offset-md-4">
                                            <div class="file-man-box rounded mt-3">
                                               
                                       
                                                <div class="file-img-box">
                                                    <img src="{{asset('public/uploads/no_image.png')}}" alt="icon" class="w-100 img-responsive" style="height:100px !important;">
                                                </div>
                                              
                                               
                                            </div>
                                        </div>
                                        </div>
                                     @endif
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        
<!-- Small modal -->

<!-- end row -->
@endsection