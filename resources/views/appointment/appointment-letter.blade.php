    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Appointment Letter</title>

       <link href="{{asset('public/letter_pdf.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
       <!--pdf maker-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    </head>
    <body>
     <section class="letter_section">
            <div class="container">
                <div class="letter_position_relative">
                    
                    <div class="main_letter_img_box_1">        
                    
                    
                    <div id="content-to-pdf" class="responsive_margin_left">
                                                  
                         
                                                   
                       <div class="main_letter_box">
        <div class="flex_main_box">
            <div class="image_logo_box">
                <img src="{{asset('public/uploads/general/'.generalSetting()->logo)}}" class="logo_image">
            </div>
            <div style="transform:translate(0px, 10px)"> 
                <h2 class="National">{{generalSetting()->site_name}}</h2>
               <div style="display: flex; align-items: center; gap: 6px; margin-top:10px;">
                    <h4 class="registration_no">Reg No:  {{generalSetting()->reg_no}}</h4>
                    
                 <div class="icon_box" style="margin-top:4px !important;">
                       <i class="fa fa-globe" aria-hidden="true" id="icon" style="transform:rotate(110deg)"></i>
                    </div>
                    <ul class="home_menu">
                            <li><a href="{{generalSetting()->site_url}}">{{generalSetting()->site_url}}</a></li>
                        </ul>
               </div>
                <div class="second_flex_box">
                    <div class="icon_box">
                        <i class="fa fa-phone" aria-hidden="true" id="icon" style="transform:rotate(110deg)"></i>
                    </div>
                    <div>
                        <ul class="home_menu">
                            <li style="transform: translate(-3px, 0px);"><a href="tel:{{generalSetting()->phone}}">{{generalSetting()->phone}}</a></li>
                        </ul>
                    </div>

                   
                  
                    <div class="icon_box">
                        <i class="fa fa-envelope" aria-hidden="true" id="icon" ></i>
                    </div>
                    <div>
                        <ul class="home_menu">
                            <li><a href="mailto:{{generalSetting()->email}}">{{generalSetting()->email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="sectore_city">{{generalSetting()->address}}</h4>
        
    </div>
                  
                   <div class="containt_box">
                          <div class="qrmain_box_1">
                              <div id="appointment_leeter_qrcode">
                              </div>
                          </div>
                       <div class="content_height_box">
                           <br>
                           <p class="to_1">To,</p>
                       <p class="to_1">{{$page->url}}</p>
                   <p class="to_1">Address:{{$page->summary}}</p>
                   <p class="to_1">Date:{{$users->verification_date}}</p>
                   <p class="to_1"><B>Subject:</b>{{$page->title}}</p>
                   <br>
                   <p class="to_1">Dear {{$users->name}},</p>
                    <p class="to_1 pt-3">
                        {!! $page->description !!}
                    
                        <br>
                   
                       </div>
                       <div class="sign_image_box_1">
                     <img src="{{asset('public/uploads/page/'.$page->image)}}" class="imagessign_1">
                   </div>
                  <div class="sign_para_1">
                       <p class="to_1">Yours’ sincerely <br> {{$page->url }}</p>
                       <p class="to_1">(Director) </p>
                       <p class="bottom_web_name">{{generalSetting()->site_name}}</p>
                   </div>
                  
                   </div>
                    
                   </div>
                   
                  <div class="pdf_main_flex" style="margin-top: 30px; padding-bottom: 60px; display:flex; justify-content:center;">
                      
                       <a onclick="generatePDF()" class="btn btn-primary">Download  PDF</a>
                       
                  </div>
                
            </div>
                </div>
            </div>
        </section>
        
        

    <script>
        $(document).ready(function () {
            $('#generate-pdf').on('click', function () {
                const element = document.getElementById('content-to-convert');
                html2pdf(element);
            });
        });
    </script>

<script>
    function generatePDF() {
        // Get the HTML content to be converted
        var element = document.getElementById('content-to-pdf');
          var name = "{{$users->name}}";
        // Configure the options for html2pdf
        var options = {
           
            filename: '{{$users->name}}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        // Use html2pdf to generate the PDF 
        html2pdf(element, options);
    }
</script>
    </body>
    </html>
 