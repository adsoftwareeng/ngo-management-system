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
            <h4 class="page-title"> 
                {{$page_title}} 
            </h4>
           <span class="">Welcome Back, {{Auth::user()->name}}</span>
        </div>
    </div>
</div>     
<!-- end page title --> 
