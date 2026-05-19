@extends('layouts.master')
@section('content')
    <link href="{{asset('public/show_letter_pdf.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
           
            <h4 class="page-title"> 
                <a href="{{route($go_back_url)}}" class="btn btn-info btn"> <i class="fa fa-arrow-left"></i> 
                    Go Back
                </a>
                {{$page_title}} 
            </h4>
        </div>
    </div>
</div>     

   
     <section class="letter_section">
            <div class="container">
                <div class="letter_position_relative">
                    
                    <div class="main_letter_img_box_1">        
                    
                    
                    <div id="content-to-pdf" class="responsive_margin_left">
                                                  
                         
                                                   
                       <div class="main_letter_box">
        <div class="flex_main_box">
            <div class="image_logo_box">
                <img src="https://vasudharasevacharitabletrust.com/software/websiteLogoImages/1712643130.png" class="logo_image">
            </div>
            <div style="transform:translate(0px, 10px)"> 
                <h2 class="National">Vasudhara Seva Charitable Trust</h2>
               <div style="display: flex;
    align-items: center;
    gap: 6px; margin-top:10px;">
                    <h3 class="registration_no">Reg No: UP/2009/0000320</h3>
                 <div class="icon_box" style="margin-top:4px !important;">
                        <img src="https://vasudharasevacharitabletrust.com/software/public/images/web_img.png" alt="" style="width:12px;">
                    </div>
                    <ul class="home_menu">
                            <li><a href="">www.vasudharasevacharitabletrust.com</a></li>
                        </ul>
               </div>
                <div class="second_flex_box">
                    <div class="icon_box">
                        <i class="fa fa-phone" aria-hidden="true" id="icon" style="transform:rotate(110deg)"></i>
                    </div>
                    <div>
                        <ul class="home_menu">
                            <li style="transform: translate(-3px, 0px);"><a href="">+91 91407 24426</a></li>
                        </ul>
                    </div>

                   
                  
                    <div class="icon_box">
                        <i class="fa fa-envelope" aria-hidden="true" id="icon"></i>
                    </div>
                    <div>
                        <ul class="home_menu">
                            <li><a href="">info@winggosoft.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="sectore_city">Sitapur Road Lucknow- 226020</h4>
        
    </div>
                  
                   <div class="containt_box">
                          <div class="qrmain_box_1">
                              <div id="appointment_leeter_qrcode">
                              </div>
                          </div>
                       <div class="content_height_box">
                           <p class="to_1">To,</p>
                       <p class="to_1">Rajkumar Maurya</p>
                   <p class="to_1">Address:&nbsp;Daligand Sector cs</p>
                   <p class="to_1">Date:&nbsp;2024-06-06</p>
                   <p class="to_1"><B>Subject:</b>&nbsp;Letter Of Appointment.</p>
                   <p class="to_1">Dear Mr.Govind,</p>
                    <p class="to_1 pt-3"><br><br><br>We are thrilled to extend an invitation to you to become a member of our organization. On behalf of our entire team, we warmly welcome you to our organization.<br><br>

Your commitment to our cause and your passion for making a difference in the community have not gone unnoticed. We believe that your involvement will greatly contribute to our efforts in our mission.<br><br>

As a member, you will have the opportunity to participate in our various initiatives, events, and projects aimed at our organization. Your input and contributions will be invaluable in advancing our mission and creating positive change.<br><br>

In addition to actively participating in our programs, as a member, you will also enjoy exclusive benefits, including:<br><br>

1) Access to members-only events and workshops<br>
  2) Networking opportunities with like-minded individuals and organizations<br>
  3) Regular updates and newsletters on our projects and initiatives<br>
  4) Opportunities for professional development and growth within the organization<br>

<br>
We are excited to have you on board and look forward to your active participation and collaboration. Should you have any questions or require further information, please do not hesitate to contact our membership coordinator.<br><br>

Once again, welcome to our organization. Together, we can make a meaningful impact and create positive change in our community.<br>
                   
                       </div>
                       <div class="sign_image_box_1">
                     <img src="https://vasudharasevacharitabletrust.com/software/certificateProviderSignature/1712643130.png" class="imagessign_1">
                   </div>
                  <div class="sign_para_1">
                       <p class="to_1">Yours’ sincerely <br> Rajkumar Maurya </p>
                       <p class="to_1">(Director) </p>
                       <p class="bottom_web_name">Vasudhara Seva Charitable Trust</p>
                   </div>
                  
                   </div>
                    
                   </div>
                   
                      
                       <a href="{{route('admin.users.downloadPDF',['type'=>$type,'id'=>$users->id])}}" class=" mt-5 mb-5  text-center pull-center btn btn-primary">Download Appointment Letter</a>
                   
            </div>
                </div>
            </div>
        </section>
 
            
       
    
<!-- end row -->
@endsection