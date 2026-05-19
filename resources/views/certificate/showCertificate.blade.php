<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link href="{{asset('public/certificate_design1.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
</head>
<body>
             <div class="headingDiv">
                <h1 class="certificate_heading_2">This Certificate Is Verified </h1>
             </div>
        <div class="container center">
            
            <div class="logo">
                <img src="{{asset('public/uploads/general/'.generalSetting()->logo)}}" class="logo_image">
            </div>

            <div class="marquee">
                Certificate of Completion
            </div>

            <div class="assignment">
                This certificate is presented to
            </div>

            <div class="person">
               {{$users->name}}
            </div>

            <div class="reason">
                {{$users->program}}
            </div>
       </div>
       
        <div class="btn_box">
            <a class="certificate_download_btn1" href="{{url('admin/download-certificate/'.$users->id)}}" target="_blank">  Download </a>
           <a  class="certificate_download_btn" href="{{route('admin.certificatelist')}}"> Go Back </a>
        </div>
    </body>
</html>