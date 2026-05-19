    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ID Card </title>

       <link href="{{asset('public/popup.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
       <!--pdf maker-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    </head>
    <body>
               <div style="position:relative">
<div class="position_absolute" style="position: absolute;
    z-index: 1000000000;
    top: 0px;
    left:25%;">
    
     <h3 class="Verified" style="text-align: center;
    width: 300px;
    margin: auto;
    background: #41586e;
    color: white;
    padding: 7px 0px;
    border-radius: 5px;" >ID Card</h3>
    
<div class="head_main2" id="content-to-pdf" >
    
    
          
    <div class="first_idcard_pdf">
        
       <p class="regestration">Registration No:{{generalSetting()->reg_no}}</p>
        
        <div class="header_3">
            
            <div class="profile">
               
                <img src="{{asset('public/uploads/general/'.generalSetting()->logo)}}" alt="" class="logo_img">
            </div>
            <div class="heading_box_idcard">
                <h1 class="first_content" style="text-transform: capitalize;">{{generalSetting()->site_name}}</h1>
            </div>
            
        </div>
        
        <p class="paragraph">Identify Card</p>
        <div class="second_main_box">
            <div class="photo_1">
                
                @php $img = $users->image?$users->image:'user.png' @endphp
                <img src="{{asset('public/uploads/users/'.$img)}}" class="logo_img_2">
            </div>
    <div class="set_qrcoder">
                     <div>
                         <div id="qrcoder" >
     
				    	</div>
                     </div>
                       </div>   
        </div>
        
    <div style="display: flex;
    flex-flow: column;
    align-items: center;
    justify-content: center; 
    transform:translateY(10px);">
        <h2 class="id_name_p">&nbsp;<b>{{$users->name}}</b></h2>
       <h2 class="id_name_2">&nbsp;<b></b></h2>
    </div>
    
    <div style="display: flex;
    gap: 20px;
    transform: translate(0px, 30px);">
        <div>
            <div class="idno" style="width: 130% !important; font-weight:bold;">ID No</div>
  <div class="idno" style="width: 130% !important; font-weight:bold;">Mobile No</div>
  <div class="idno" style="width: 130% !important; font-weight:bold;">Email ID</div>
  <div class="idno" style="width: 130% !important; font-weight:bold;">City</div>
  
        </div>
        <div>
            <div class="idno">{{$users->id}}</div>
  <div class="idno">{{$users->phone}}</div>
  <div class="idno">{{$users->email}}</div>
  <div class="idno">{{$users->city}}</div>
  
        </div>
    </div>
    
        <p class="sampark_1">{{$page->title}}</p>
        <div class="first_card_footer_1">
            <div class="main_box">
                <div>
                    <a href="" class="anchor"><i class="fa fa-phone-square" aria-hidden="true"></i> {{generalSetting()->phone}}</a>
                </div>
                <div>
                    <a href="" class="anchor"><i class="fa fa-envelope" aria-hidden="true"></i> {{generalSetting()->email}}</a>
                </div>
            </div>
            <div class="anchor_1">
                <a href="" class="anchor_2"><i class="fa fa-map-marker" aria-hidden="true"></i> {{generalSetting()->address}}</a>
            </div>
        </div>
    </div>
    
    <div class="second_idcard_pdf">
        <p class="regestration">Registration No:{{generalSetting()->reg_no}}</p>
       <div class="header_3">
            
            <div class="profile">
                 <img src="{{asset('public/uploads/general/'.generalSetting()->logo)}}" alt="" class="logo_img">
            </div>
            <div class="heading_box_idcard">
                <h1 class="first_content" style="text-transform: capitalize;">{{generalSetting()->site_name}}</h1>
            </div>
            
        </div>
        <h2 class="CONDITIONS">{{$page->summary}}</h2>
        <div class="paragraph_flex_1">
            {!! $page->description !!}
                    
            <div class="Join_1">
                
                 <div class="Join">Joining Date: {{$users->verification_date}}</div>
                  <div class="Join">Validity : {{$users->validity}}</div>
                 
                 
                
            </div>
        </div>
    
       <div class="second_footer_1">
            <div class="main_box">
                <div>
                    <a href="" class="anchor"><i class="fa fa-phone-square" aria-hidden="true"></i> {{generalSetting()->phone}}</a>
                </div>
                <div>
                    <a href="" class="anchor"><i class="fa fa-envelope" aria-hidden="true"></i>  {{generalSetting()->email}}</a>
                </div>
            </div>
            <div class="anchor_1">
                <a href="" class="anchor_2"><i class="fa fa-map-marker" aria-hidden="true"></i>  {{generalSetting()->address}}</a>
            </div>
        </div>
    </div>
 
  
</div>


    </div>
    
    </div>
   

     <div class="bottom_box">
    
     <div style="display: flex;
    justify-content: center;
    margin-top: 80px !important;
    margin-bottom: 30px;
    margin-left: 0px;">
               <button onclick="generatePDF()" class="download_btn_pdf" style="transform: translate(0px, -40px) !important;">Download PDF</button>
               </div>
               </div>


            
   

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
 