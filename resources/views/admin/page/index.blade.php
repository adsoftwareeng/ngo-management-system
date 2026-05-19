@extends('layouts.master')
@section('content')
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Aqua</a></li>
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
                    <h4 class="header-title"> {{$page_title}} List </h4>
                </div>
                 @if($main_title=='news-updates')
                <div class="col-2">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#addexampleModal"> <i class="fa fa-plus"></i> Add News </a>
                </div>
                @endif
                
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    @if($main_title=='news-updates')
                     <th>Link</th>
                    @else
                    <th>Summary</th>
                    @endif
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($page as $key => $enq)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{substr($enq->title,0,50)}}</td>
                         @if($main_title=='news-updates')
                         <td>{{$enq->url}}</td>
                         @else
                        <td>{{ substr($enq->summary,0,50)}}</td>
                        @endif
                        <td>
                            <a data-toggle="modal" data-target="#editModal_{{$enq->id}}" class="btn btn-xs bg-primary text-white">
                                <i class="fa fa-edit"></i>
                            </a> 
                      
                        </td>
                    </tr>
                         <!--------- edit modal----------------->
                           <div class="modal fade" id="editModal_{{$enq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update News & Updates</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form  action="{{ route('admin.page.store')}}" method="post"    enctype="multipart/form-data">
                                                   @csrf
                                                
                                                <input type="hidden" name="id" value="{{$enq->id}}">
                                                <input type="hidden" name="type" value="news-updates">
                            
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                                <div class="col-md-10">
                                                                <input type="text" name="title" value="{{$enq->title}}" class="form-control"  placeholder="Enter Name">
                                                                </div>
                                                            </div>
                                                     
                                                            
                                                          
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label" for="simpleinput"> URL</label>
                                                                <div class="col-md-10">
                                                                <input type="text" name="url" value="{{$enq->url}}" class="form-control"  placeholder="Enter  URL">
                                                                </div>
                                                            </div>
                                                           
                                                              <div class="form-group row pull-center text-center">
                                                                <div class="col-md-12">
                                                                    <button  type="submit" class="btn btn-primary">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                            
                                                        </form>
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                           <!--------- end edit modal ----------->
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->


<!------- model -------------->


<!-- Modal -->
<div class="modal fade" id="addexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add News & Updates</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{ route('admin.page.store')}}" method="post"    enctype="multipart/form-data">
                       @csrf
                    <input type="hidden" name="type" value="news-updates">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                         
                                
                              
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput"> URL</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url"  class="form-control"  placeholder="Enter  URL">
                                    </div>
                                </div>
                               
                                  <div class="form-group row pull-center text-center">
                                    <div class="col-md-12">
                                        <button  type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </form>
      </div>
     
    </div>
  </div>
</div>
<!-------- end model ------->
@endsection