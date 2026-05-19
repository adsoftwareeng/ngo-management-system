@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
   <style>
        .preview {
            display: inline-block;
            margin: 10px;
        }
        .preview img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }
    </style>
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
                <div class="col-2">
                    <a href="{{$go_back_url}}" class="btn btn-info btn-xs"> <i class="fa fa-arrow-left"></i> 
                        Go Back
                    </a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
          <!---->
             <div class="row">
                    <div class="col-12">
                        
                            
                             <form  class="dropzone" action="{{ route('admin.event.multistore')}}" method="post"   enctype="multipart/form-data">
                                  @csrf
                               <div class="card-box">
                                <div class="dz-message needsclick" id="myDropzone">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h4 class="mt-3">Drop files here or click to upload.</h4>
                                    <span class="text-muted font-13"> Selected files</span>
                                    
                                      
                                </div>
                            <input type="file" name="image[]" id="file-input" style="display: none;" multiple>
                           </div>
                            <div class="form-group row">
                                 <div id="preview-container"></div>
                            </div>    
                            
                         <input type="hidden" name="type" value="event">
                         <input type="hidden" name="event_id" value="{{$event_id}}">
                            
                            <div class="clearfix text-right mt-3">
                                <button type="submit" class="btn btn-danger"> <i class="mdi mdi-send mr-1"></i> Submit</button>
                            </div>
                             </form>
                             <!-- end card-box -->
                    </div> <!-- end col-->
            </div>
          <!---->
    </div>
      <!-- End Form -->
    </div>
</div>
<!-- end row -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#file-input").on("change", function(){
            var files = $(this)[0].files;
          //  alert(files);
            $("#preview-container").empty();
            if(files.length > 0){
                if(files.length  < 10){
                    for(var i = 0; i < files.length; i++){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $("<div class='preview'><img src='" + e.target.result + "'><Br/><a class='delete text-danger'>Delete</a></div>").appendTo("#preview-container");
                        };
                        reader.readAsDataURL(files[i]);
                    }
                }else{
                    
                    alert("You can select only 10 image at a time.");
                }
            }
        });
    $("#preview-container").on("click", ".delete", function(){
            $(this).parent(".preview").remove();
            $("#file-input").val(""); // Clear input value if needed
        });
    });
</script>

@endsection
