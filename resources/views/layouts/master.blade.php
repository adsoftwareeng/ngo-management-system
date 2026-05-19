<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>{{generalSetting()->site_name}} -  {{ $page = $page_title ?? '' }} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
         <link rel="shortcut icon" href="{{asset('public/uploads/general/'.generalSetting()->favicon)}}">

        <!-- C3 Chart css -->
        <link href="{{asset('public/backend/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css" />
            
        <!-- Summernote css -->
        <link href="{{asset('public/backend/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />
                <!-- App css -->
        <!-- third party css -->
        <link href="{{asset('public/backend/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    
        <!-- Plugins css -->
        <link href="{{asset('public/backend/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
        

        <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('public/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{asset('public/backend/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
        
        <!-- Plugins css -->
        <!--<link href="{{asset('public/backend/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />-->
    
    <style>
        @font-face {
            font-family: summernote;
            src : asset('public/backend/fonts/summernote.ttf');
            src : asset('public/backend/fonts/summernote.eot');
            src : asset('public/backend/fonts/summernote.woff');
            }
        body{
           color:#000 !important;
        }
        .form-control{
            color:#000 !important; 
            border:1px solid #b7b7b7 !important;
        }
        .tableBorder{
            border:1px solid #000 !important;
            color: #000;
        }
    </style>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            @if(Auth::user()->role=='admin')
                @include('partials.navbar_admin')
            @else
                @include('partials.navbar_user')
            @endif
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        @if(Auth::user()->role=='user')
                             @include('partials.auth_banner')
                        @endif
                          @yield('content')
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
           <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                {{generalSetting()->copyright}}
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <script src="{{asset('public/backend/js/vendor.min.js')}}"></script>

        <!--C3 Chart-->
        <script src="{{asset('public/backend/libs/d3/d3.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/c3/c3.min.js')}}"></script>

        <script src="{{asset('public/backend/libs/echarts/echarts.min.js')}}"></script>

        <script src="{{asset('public/backend/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('public/backend/js/app.min.js')}}"></script>

         <!-- Vendor js -->
        <!--<script src="{{asset('public/backend/js/vendor.min.js')}}"></script>-->

        <!-- Required datatable js -->
        <script src="{{asset('public/backend/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('public/backend/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('public/backend/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/datatables/buttons.colVis.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('public/backend/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('public/backend/js/pages/datatables.init.js')}}"></script>


        <!-- Plugins js -->
        <script src="{{asset('public/backend/libs/katex/katex.min.js')}}"></script>
        <script src="{{asset('public/backend/libs/quill/quill.min.js')}}"></script>

         <!-- Init js-->
        <script src="{{asset('public/backend/js/pages/form-quilljs.init.js')}}"></script>
          <!-- Summernote js -->
        <script src="{{asset('public/backend/libs/summernote/summernote-bs4.min.js')}}"></script>

        <!-- Init js -->
        <script src="{{asset('public/backend/js/pages/form-summernote.init.js')}}"></script>
        
        <!-- Plugins js -->
        <!--<script src="{{asset('public/backend/libs/dropzone/dropzone.min.js')}}"></script>-->
        
        


        {{-- REMOVE METHOD MODAL --}}
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-center pull-center">
                    <form action="" method="POST" id="deletePostForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title text-capitalize"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">@lang('No')</button>
                            <button type="submit" class="btn btn-sm btn-danger">@lang('Yes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(!empty($delete_title))
        <script>
       // console.log('Hello');
        
             // Delete 
            $(document).on('click', '.delete-btn' ,function () {
         //       alert('helo');
                var modal   = $('#deleteModal');
                var id      = $(this).data('id');

                console.log(id);
                var form    = document.getElementById('deletePostForm');
                modal.find('.modal-title').text('{{ "Delete ".$delete_title }}');
                modal.find('.modal-body').text('{{ "Are you sure to delete this ".$delete_title }}?');
                form.action = '{{ route($delete_url, '') }}' + '/' + id;
                modal.modal('show');
            });
            // Delete Popup 
        </script>
        
        @endif
         <script>
        $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Category Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#categoryData').on('change', function () {
                var idCategory = this.value;
                // alert(idCategory);
                $("#subcategoryData").html('');
                $.ajax({
                    url: "{{url('admin/fetchSubcategory')}}",
                    type: "POST",
                    data: {
                        cate_id: idCategory,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#subcategoryData').html('<option value="">-- Select Sub Category --</option>');
                        $.each(result.subcategory, function (key, value) {
                            $("#subcategoryData").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                       
                    }
                });
            });
  
  
        });
        </script>
        @stack('script-lib')
             @include('partials.notify')
        @stack('script')
        <script>
        $(document).ready(function(){
            $("#myDropzone").click(function(){
                $("#file-input").trigger('click');
            });
        });
        </script>
    </body>

</html>
