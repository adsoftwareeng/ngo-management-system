
 <!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <?php if(!empty($type)){
            $seo = App\Models\Seo::where('type',$type)->first();
        }else{
        $routeName = request()->route() ? request()->route()->getName() : null; // Check if the route exists
        $seo = $routeName ? App\Models\Seo::where('type', $routeName)->first() : null;
        $page_title ='';
        }
    ?>
  <!------- SEO Content --------->
    <title><?php echo e($seo ? $seo->page_title : $page_title); ?></title>
    <?php if(!empty($seo)): ?>
    <meta name="description" content="<?php echo e($seo ? $seo->description : generalSetting()->site_name.' Description'); ?>">
    <meta name="keywords" content="<?php echo e($seo ? $seo->keywords : generalSetting()->site_name.' Keywords'); ?>">
    <meta name="author" content="<?php echo e($seo ? $seo->author : generalSetting()->site_name); ?>">
    <link rel="dns-prefetch" href="<?php echo e($seo ? $seo->dns_prefetch : ''); ?>">
    <link rel="preconnect" href="<?php echo e($seo ? $seo->preconnect : ''); ?>">
    <link rel="canonical" href="<?php echo e($seo ? $seo->canonical : url()->current()); ?>">
    
    <!-- Open Graph Data -->
    <meta property="og:title" content="<?php echo e($seo ? $seo->og_title : $page_title); ?>">
    <meta property="og:image" content="<?php echo e($seo ? asset('public/uploads/seo/'.$seo->og_image) : ''); ?>">
    <meta property="og:image:width" content="<?php echo e($seo ? $seo->og_image_width : ''); ?>">
    <meta property="og:image:height" content="<?php echo e($seo ? $seo->og_image_height : ''); ?>">
    <meta property="og:description" content="<?php echo e($seo ? $seo->og_description : $page_title); ?>">
    <meta property="og:url" content="<?php echo e($seo ? $seo->og_url : url()->current()); ?>">
    <meta property="og:site_name" content="<?php echo e($seo ? $seo->og_site_name : generalSetting()->site_name); ?>">
    <meta property="og:type" content="<?php echo e($seo ? $seo->type : generalSetting()->site_name); ?>">
    <?php endif; ?>
  <!-------  End SEO Content --------->
  
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('public/uploads/general/'.generalSetting()->favicon)); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('public/uploads/general/'.generalSetting()->favicon)); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('public/uploads/general/'.generalSetting()->favicon)); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('public/uploads/general/'.generalSetting()->favicon)); ?>">
	
	<link href="<?php echo e(asset('/public/font/Roboto-Regular.ttf')); ?>">
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/vendor/bootstrap-dropdownhover.min.css">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/animate.css" />
	
	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/frontend/css/')); ?>/style.css" />
	
    <script src="<?php echo e(asset('public/frontend/js/')); ?>/vendor/modernizr.min.js"></script>

	<style>
	 #\:2\.container {
        display: none; /* Hides the iframe */
    }
		.donateTab{
			width: 30px !important;
			height: 30px!important;
/*			background-color: #890800!important;*/
            background-color: #890800;
    }
    .bdbottomborder {
        border-bottom: 1px solid #eaeaea;
    }
    .bgColorSecond {
        background-color: #f2f2f2;
    }
    .bgColorThird{
        background-color:#f8b864;
    }
    .galleryImg{
        width:100% !important;
        height:247px !important;
    }
    .teamImg{
        width:100%;
        height:250px;
    }
    
	</style>
    
         <style>
        .slider-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            position: relative;
        }
        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease;
        }
        .slider-item {
            flex: 0 0 25%; /* 4 items on desktop */
            box-sizing: border-box;
            padding: 10px;
        }
        .slider-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        .slider-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .slider-nav button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .slider-item {
                flex: 0 0 100%; /* 1 item on mobile */
            }
            .imgLogo{
                width:63px !important;
            }
            
        }
        
        
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
          .banner.owl-carousel {height: 200px !important;}
           .cardDiv{ padding-top:4px !important;}
           
            .imgLogo{
                width:63px !important;
            }
        }
        
        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
          .banner.owl-carousel {height: 250px !important;}
          .cardDiv{ padding-top:4px !important;}
          
            .imgLogo{
                width:63px !important;
            }
        }
        
        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
          .banner.owl-carousel {height: 280px !important;}
          .cardDiv{ padding-top:4px !important;}
          .hideLargeScreen{display:none !important;}
          
            .imgLogo{
                width:73px !important;
            }
        } 
        
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
          .banner.owl-carousel {height: 300px !important;}
          .hideLargeScreen{display:none !important;}
           /*.cardDiv{ padding-top:4px !important;}*/
        } 
        
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
          .banner.owl-carousel {height: 100% !important;}
          .hideLargeScreen{display:none !important;}
           /*.cardDiv{ padding-top:4px !important;}*/
        }
        
        .textSm{
                font-size:15px;
            }
        .bgColor{
            background-color:#890800 !important;
        }
        .footer .footer-item .footer-title{
            padding-top:10px !important;
            padding-bottom:2px !important;
        }
        /*.header-1 .navbar-main{*/
        /*    background-color:#890800 !important;*/
        /*    color:#fff !important;*/
        /*}*/
        /*.header-1 .navbar-main:hover{*/
        /*    color:#000;*/
        /*}*/
        /*.header-1 .navbar-main .navbar-nav .active > .nav-link{*/
        /*    color:#000 !important;*/
        /*}*/
        /*.navbar-main .navbar-toggler-icon{*/
        /*    background-image:url(<?php echo e(asset('public/toggler_icon.png')); ?>);*/
        /*}*/
        .certificate{
            width:100%;
            height:350px;
        }
        .banner1Image{
            width:100%;
            height:514 px;
        }
        
        .banner2Image{
            width:100%;
            height:300px;
        }
        .banner3Image{
            width:100%;
            height:206px;
        }
        .initiveDecLength{
            height:60px;
            color:#333333 !important;
        }
        
        .initiveEventImg{
        width:100% !important;
        height:250px !important;
        }
        .initiveBox{
           background-color:#F8F8F8 !important;    
        }
        
        /*// header menu */
        .header-1 .navbar-main {
            background-color: #890800 !important;
        }
        .header-1 .navbar-main .navbar-nav .active > .nav-link{
            color:#fff !important;
            /*background-color: #fff !important;*/
            /*border :1px solid #890800;*/
        }
        .navbar-main .dropdown-toggle::after{
            color:#fff !important;
        }

        .header-1 .navbar-main .navbar-nav .nav-link:hover, .header-1 .navbar-main .navbar-nav .nav-link:focus{
             color:#fff !important;
            /*background-color: #fff !important;*/
            /*border :1px solid #890800;*/
        }
        .navbar-main .dropdown-menu{
             background-color: #890800 !important;
        }
        
        .box-icon-1 .icon{
            background:none !important;
        }
        .txtColor{
            color:#890800;
        }
    .navbarToggler{
        position: absolute !important;
        float: right !important;
        border: 0px solid transparent !important;
        right: 14px  !important;
        margin: 0  !important;
        padding: 0  !important;
        /*top: 18px  !important;*/
         
    /*background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255,112,0,1)' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); */
    }
    .imgLogo{
        width:93px;
    }
    </style>
</head>

<body data-aos-easing="ease-in-out-sine" data-aos-duration="400" data-aos-delay="0">

	<!-- LOAD PAGE -->
	<!-- <div class="animationload">
		<div class="loader"></div>
	</div> -->
	
	<!-- BACK TO TOP SECTION -->

    <!-- Page-->
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!------------- Apply ------------->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">
                     Apply Now
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?php echo e(route('job.store')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
              <div class="modal-body">
                  <input type="hidden" name="job_id" value="" id="job_id">
                 <div class="form-group">
                     <input type="text" name="name" class="form-control" placeholder="Name">
                 </div>
                  <div class="form-group">
                     <input type="email" name="email" class="form-control" placeholder="Email">
                 </div>
                  <div class="form-group">
                     <input type="text" name="phone" class="form-control" placeholder="Phone">
                 </div>
                 
                  <div class="form-group">
                     <input type="text" name="position_apply" class="form-control" placeholder="Position Apply">
                 </div>
                  <div class="form-group">
                     <input type="text" name="salary_expected" class="form-control" placeholder="Salary Expected">
                 </div>
                 <div class="form-group">
                     <div class="row">
                         <div class="col-md-4 form-group">
                                <label>Upload Resume</label>
                         </div>
                         <div class="col-md-8 form-group">
                             
                           <input type="file" name="resume" class="form-control" placeholder="Resume">
                         </div>
                     </div>
                 </div>
                 
                 <div class="form-group">
                  <div class="captcha">
                  <span style="border:2px solid #eeee"><?php echo captcha_img('math'); ?></span>
                  <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                  </div>
                </div>
                
                <div class="form-group">
                  <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                  <?php if($errors->has('captcha')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('captcha')); ?></strong>
                      </span>
                  <?php endif; ?>
                </div>

                
                 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    <!------------- end apply --------->


	<!-- JS VENDOR -->
	<script src="<?php echo e(asset('public/frontend/js')); ?>/vendor/jquery.min.js"></script>
	<script src="<?php echo e(asset('public/frontend/js')); ?>/vendor/bootstrap.min.js"></script>
	<script src="<?php echo e(asset('public/frontend/js')); ?>/vendor/owl.carousel.js"></script>
	<script src="<?php echo e(asset('public/frontend/js')); ?>/vendor/jquery.magnific-popup.min.js"></script>

	<!-- SENDMAIL -->
	<script src="<?php echo e(asset('public/frontend/js')); ?>/vendor/validator.min.js"></script>
	<script src="<?php echo e(asset('public/frontend/js')); ?>/vendor/form-scripts.js"></script>
    
    
	<script src="<?php echo e(asset('public/frontend/js')); ?>/animate.js"></script>
	<script src="<?php echo e(asset('public/frontend/js')); ?>/script.js"></script>

        
    <?php echo $__env->yieldPushContent('script-lib'); ?>
            <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script'); ?>
    
    
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sliderWrapper = document.getElementById('sliderWrapper');
        const sliderItems = document.querySelectorAll('.slider-item');
        let currentIndex = 0;
        const itemsPerViewDesktop = 4;
        const itemsPerViewMobile = 1;
        const totalSlidesDesktop = Math.ceil(sliderItems.length / itemsPerViewDesktop);
        const totalSlidesMobile = Math.ceil(sliderItems.length / itemsPerViewMobile);
        const autoSlideInterval = 3000; // Time in milliseconds (3 seconds)

        function updateSliderPosition() {
            const width = window.innerWidth;
            const itemsPerView = width > 768 ? itemsPerViewDesktop : itemsPerViewMobile;
            const offset = -currentIndex * (100 / itemsPerView);
            sliderWrapper.style.transform = `translateX(${offset}%)`;
        }

        function nextSlide() {
            const width = window.innerWidth;
            const totalSlides = width > 768 ? totalSlidesDesktop : totalSlidesMobile;
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSliderPosition();
        }

        document.getElementById('nextBtn').addEventListener('click', nextSlide);

        document.getElementById('prevBtn').addEventListener('click', function() {
            const width = window.innerWidth;
            const totalSlides = width > 768 ? totalSlidesDesktop : totalSlidesMobile;
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSliderPosition();
        });

        window.addEventListener('resize', updateSliderPosition);

        updateSliderPosition(); // Initial update

        // Auto-slide functionality
        setInterval(nextSlide, autoSlideInterval);
    });

document.addEventListener('DOMContentLoaded', function() {
    AOS.init();
});

$(document).on('ready',function(){
    $('.videoDiv').on('click',function(){
        // alert('hello');
       this.get(0).play; 
    });
    

    //
    
    $(".btn-refresh").click(function(){
      $.ajax({
         type:'GET',
         url:'<?php echo e(asset('/')); ?>refresh_captcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    });
    
});
</script>
<script>
  $(document).ready(function(){
    $('.testimonial-carousel').owlCarousel({
    //   items: 2,              // Show one testimonial at a time
      loop: true,            // Infinite looping
      margin: 10,            // Space between items
      nav: false,             // Enable navigation arrows
      dots: true,            // Enable navigation dots
      autoplay: true,        // Enable autoplay
      autoplayTimeout: 5000, // Autoplay delay (in milliseconds)
      smartSpeed: 800 ,       // Speed of transitions
          responsive: {
      0: {
        items: 1           // 1 item on screens from 0px and above (mobile view)
      },
      768: {
        items: 2           // 2 items on screens from 768px and above (tablet and desktop view)
      }
    }
    });
    
    // jobSelected 
    $('.jobSelected').on('click',function(){
         $('#job_id').val('');  
         var jobSelect = $(this).data('id');
         console.log(jobSelect);
         if(jobSelect){
            $('#job_id').val(jobSelect);
         }else{
             $('#job_id').val('');       
         }
    });
    
  });
</script>


<!------------------------------------------------->
     <a href="tel:<?php echo e(generalSetting()->phone); ?>" class="phone"><img src="<?php echo e(asset('public/common/phone.png')); ?>" /></a>
    <a href="https://api.whatsapp.com/send?phone=<?php echo e(generalSetting()->whatsapp_number); ?>" target="blank" class="whatsapp"><img src="<?php echo e(asset('public/common/whatsapp.png')); ?>"></a>
    <div class="google_transalate" id="google_translate_element"></div>
    <link rel="stylesheet" href="<?php echo e(asset('public/common/formsidebar.css')); ?>">
    <script src="<?php echo e(asset('public/common/formsidebar.js')); ?>"></script>

<script>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });

</script>

<!----------- Google Translate ----------->


<!----------- Google Translate ----------->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,hi,bn,te,mr,ta,ur,gu,kn,ml,pa,or,as,ks,sa,sd,ne', 
            // All major Indian languages + English
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }

    // Load Google Translate JS
     // Change dropdown first option text
    const changeSelectText = setInterval(() => {
        const combo = document.querySelector('.goog-te-combo');
        if (combo && combo.options.length > 0) {
            combo.options[0].text = "All Languages";
            clearInterval(changeSelectText);
        }
    }, 500);
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    // Function to remove the Google Translate iframe
    function removeGoogleTranslateIframe() {
        const iframe = document.querySelector('iframe[src*="translate.google.com"]');
        if (iframe) {
            iframe.style.display = 'none'; // Hide the iframe
            iframe.remove(); // Remove the iframe from the DOM
        }
    }

    // Function to clean specific styles from the body
    function cleanBodyStyles() {
        const body = document.body;
        if (body) {
            // Remove specific styles
            body.style.position = '';
            body.style.minHeight = '';
            body.style.top = '';
        }
    }

    // Set up a single MutationObserver to watch for both added nodes and attribute changes
    const observer = new MutationObserver((mutationsList) => {
        for (const mutation of mutationsList) {
            if (mutation.type === 'childList') {
                removeGoogleTranslateIframe(); // Remove iframe if added
            }
            if (mutation.type === 'attributes') {
                cleanBodyStyles(); // Clean body styles if attributes change
            }
        }
    });

    // Start observing the body for changes
    observer.observe(document.body, {
        attributes: true,
        childList: true,
        subtree: true
    });
</script>
<script>
    $(document).ready(function(){
         $('.designBy').html("<a href='https://ihuntech.com/' target='_blank' class='text-white'> || Design & Develop by iHuntech PVT LTD</a>");
        
    });
</script>
<!---->
<!---->
</body>

</html><?php /**PATH D:\projects\iHunTech-projects\ngo-management-system\resources\views/layouts/master_frontend.blade.php ENDPATH**/ ?>