@extends('layouts.master')
@section('content')
  <!-- start page title -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-title"> {{$page_title}} List </h4>
                </div>
                <div class="col-2">
                    <a href="{{route('admin.videos.add')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add {{$delete_title}}</a>
                </div>
            </div>
           
                    <div class="card-box">
                  @if(!empty($gallery) && count($gallery)>0)
                          <div class="row">
                              @foreach($gallery as $key => $enq)
                        <div class="col-lg-4">
                        <!-- 21:9 aspect ratio -->
                         <div  class="file-man-box rounded mt-1 {{$enq->status=='inactive'? 'border border-danger' : ' '}} ">
                            <a href="#" class="file-close delete-btn"  data-id="{{ $enq->id }}"><i class="mdi mdi-close-circle"></i></a>
                              <a href="#"  data-toggle="modal" data-target=".bd-edit-modal-sm-{{$enq->id}}" class="file-edit"><i class="fa fa-edit"></i> </a>
                            <div class="file-img-box mt-2">
                                <div class="embed-responsive embed-responsive-21by9 ">
                                        <iframe class="embed-responsive-item" src="{{$enq->image}}?autohide=0&showinfo=0&controls=0"></iframe>
                                    </div>
                            </div>
                        </div>
                     </div>
                       <!----- edit modal--->
                                    <div class="modal fade bd-edit-modal-sm-{{$enq->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
          <form class="form-horizontal" action="{{ route('admin.videos.store')}}" method="post" id="addForm"   enctype="multipart/form-data">
                       @csrf
                               
      <div class="modal-header">
        <h5 class="modal-title">Update {{$delete_title}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="hidden" name="id" value="{{$enq->id}}">

                                <div class="form-group row">
                                <label class="col-md-12 col-form-label" for="example-email">Video Url</label>
                                    <div class="col-md-12">
                                      <input type="text" class="form-control" name="image" value="{{$enq->image}}" placeholder="Enter URL"  data-input="false">
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-md-12 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-12">
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
            <!-- end col -->
          
        </div>
    </div>
</div>
<!-- end row -->
<script>
        var player;
        // This function creates an <iframe> (and YouTube player) after the API code downloads.
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '360',
                width: '640',
                videoId: '8eO-5EjR548',
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        // The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }
    </script>
@endsection