<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\IndustrialTrainingController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\MembershipListController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\{InitiativeController, PaymentSettingController,JobController,AlbumController,CaseListController};

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\MembershipController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\Payment\PhonepeController;
use App\Http\Controllers\JobApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    $notify[]=['success', 'Cache cleared successfully'];
    return redirect()->back()->withNotify($notify);
})->name('clear-cache');

Route::get('refresh_captcha', [CaptchaController::class,'reloadCaptcha'])->name('refresh_captcha');

Route::controller(HomeController::class)->group(function() {
    Route::get('/','index')->name('home');
    Route::get('home','index');
    Route::get('course','course')->name('course');
    Route::get('projects','services')->name('services');
    Route::get('projects/{slug}','service_details')->name('service.details');
    Route::get('our-blogs','blogs')->name('blogs');
    Route::get('our-blogs/{slug}','blogs_details')->name('blogs.details');
    Route::get('/user-view/{slug}', 'UserInfo')->name('user.profile');
});

Route::controller(ImageController::class)->group(function() {
    
     Route::get('album/gallery/{slug}','gallery')->name('album.gallery');
     Route::get('gallery','album')->name('gallery');
     Route::get('press-release','press')->name('press');
     Route::get('video','video')->name('video');
     Route::get('award/{type}','award')->name('award');
     Route::get('team','team')->name('team');
     Route::get('team-detail/{slug}','teamDetail')->name('team.detail');
     Route::get('event/{type}','event')->name('event');
     Route::get('event-detail/{slug}','event_detail')->name('event.detail');
     
     
     Route::get('case/{type}','cases')->name('case');
     Route::get('case-detail/{slug}','case_detail')->name('case.detail');
     
     Route::get('initiative','initiative')->name('initiative');
     Route::get('initiative-detail/{slug}','initiative_detail')->name('initiative.detail');
  
     Route::get('activity','activity')->name('activity');
     Route::get('activity-detail/{slug}','activity_detail')->name('activity.detail');
 });

Route::controller(PagesController::class)->group(function() {
     Route::get('about','about')->name('about');
    //  Route::get('president','about')->name('president');
     Route::get('pages/{type}','pages')->name('pages');
     Route::get('mission-vission','mission_vission')->name('mission_vission');
 });

 Route::controller(ContactController::class)->group(function() {
     Route::get('contact-us','contactus')->name('contactus');
     Route::post('contact-store','contactstore')->name('contactstore');
     Route::get('book-now','booknow')->name('appointment');
     Route::post('enquiry-post','enquiry_post')->name('enquiry.post');
     Route::get('thank-you','thankyou')->name('thankyou');
     Route::post('event-store','eventstore')->name('eventstore');
     
     Route::get('join-us','joinus')->name('joinus');
     Route::post('join-store','joinstore')->name('joinstore');
 });
 
 Route::controller(DonateController::class)->group(function() {
     Route::get('donate-us','donate')->name('donate');
     Route::post('donate-store','donatestore')->name('donatestore');
     Route::post('bank-transfer','processBankPaymentSubmit')->name('bankTransfer');
     Route::get('thankyou','thankyou')->name('thanksyou');
     
 });
 
//  JobApplicationController
 Route::controller(JobApplicationController::class)->group(function() {
     Route::get('job-listing','jobList')->name('job.listing');
     Route::get('job-detail/{slug}','jobDetail')->name('job.detail');
     Route::post('job-store','jobStore')->name('job.store');
 });
 
// payment

  // PhonePe 
    Route::controller(PhonepeController::class)->group(function() {
        Route::post('phonepe/notify',  'notify')->name('phonepe.notify');
        Route::get('phonepe/submit/{id}', 'store')->name('phonepe.submit');
     });
   // end PhonePe
      
        // Route::post('/checkout-submit', 'DonateController@checkout')->name('front.checkout.submit');
        // Route::get('/checkout/success', 'DonateController@paymentSuccess')->name('front.checkout.success');
        // Route::get('/checkout/cancle', 'DonateController@paymentCancle')->name('front.checkout.cancle');
        // Route::get('/checkout/redirect', 'DonateController@paymentRedirect')->name('front.checkout.redirect');
        // Route::get('/checkout/mollie/notify', 'DonateController@mollieRedirect')->name('front.checkout.mollie.redirect');
        
        Route::post('/paytm/notify', 'Payment\PaytmController@notify')->name('front.paytm.notify');
        Route::post('/paytm/submit', 'Payment\PaytmController@store')->name('front.paytm.submit');
        Route::post('/razorpay/notify', 'Payment\RazorpayController@notify')->name('front.razorpay.notify');
        Route::post('/razorpay/submit', 'Payment\RazorpayController@store')->name('front.razorpay.submit');
        Route::post('/flutterwave/notify', 'Payment\FlutterwaveController@notify')->name('front.flutterwave.notify');
        Route::post('/flutterwave/submit', 'Payment\FlutterwaveController@store')->name('front.flutterwave.submit');
        Route::post('/mercadopago/submit', 'Payment\MercadopagoController@store')->name('front.mercadopago.submit');
        Route::post('/authorize/submit', 'Payment\AuthorizeController@store')->name('front.authorize.submit');

        Route::post('/sslcommerz/notify', 'Payment\SslCommerzController@notify')->name('front.sslcommerz.notify');
        Route::post('/sslcommerz/submit', 'Payment\SslCommerzController@store')->name('front.sslcommerz.submit');

// end payment

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/manage', 'login')->name('login');
    Route::get('/login', 'login')->name('userlogin');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

// User routes

   Route::group(['auth' => 'user','controller'=>MembershipController::class], function(){
        Route::get('/membership-status',  'index')->name('user.membershipstatus');
        Route::get('/membership-form',  'membershipForm')->name('user.membershipform');
        Route::post('/membership-submit',  'membershipSubmit')->name('user.membershipSubmit');
    });

Route::group(['middleware' =>'user','auth' => 'user','controller'=>UserController::class], function(){

    Route::get('/user',  'index')->name('user.dashboard'); 
    Route::get('/id-card', 'id_card')->name('user.id_card');
    Route::get('/appointment-letter', 'appointment')->name('user.appointment');
    Route::get('/certificate', 'certificate')->name('user.certificate');
    Route::get('/profile', 'profile')->name('user.profile');
    Route::get('/edit-profile', 'form')->name('user.edit_profile');
    Route::post('update-profile','store')->name('user.profile.store');
    Route::get('/membership','membership')->name('user.membership');
   // Other user routes
    
});

// admin Route

Route::group(['prefix' => 'admin','middleware' =>'admin','auth' => 'admin'], function(){
// DashboardController
Route::controller(DashboardController::class)->group(function(){
    Route::get('/index', 'dashboard')->name('dashboard');
    Route::get('/dashboard', 'dashboard');
});


// membership 
Route::controller(MembershipListController::class)->group(function() {
     Route::get('/membership-list', 'index')->name('admin.membership');
     Route::get('/membership-list/{status}', 'index')->name('admin.membership.status'); 
     Route::get('/membership-add', 'form')->name('admin.membership.add');  
     Route::get('/membership-edit/{id}', 'form')->name('admin.membership.edit'); 
     Route::post('membership-store','store')->name('admin.membership.store');
     Route::post('membership/delete/{id}', 'delete')->name('admin.membership.delete');
     
      
      
     Route::get('user-qrcode', 'showQRCode')->name('admin.user.qrcode');
     Route::get('user/{id}/download-qr', 'downloadUserQRCode')->name('admin.user.qrcode.download');
});

//UserListController 
Route::controller(UserListController::class)->group(function() {
     Route::get('/users-list', 'index')->name('admin.users');
     Route::get('/users-list/{status}', 'index')->name('admin.users.status'); 
     Route::get('/users-add', 'form')->name('admin.users.add');  
     Route::get('/users-edit/{id}', 'form')->name('admin.users.edit'); 
     Route::post('users-store','store')->name('admin.users.store');
     Route::post('users/delete/{id}', 'delete')->name('admin.users.delete');
     Route::get('/users-card', 'card')->name('admin.users.card');
     Route::get('/users-card/{type}', 'card');
     Route::get('/card/{type}/{id}','showAppointmentLetter')->name('admin.users.letter');
     Route::get('/download-appointment-letter/{type}/{id}','downloadPDF')->name('admin.users.downloadPDF');
});


//CertificateController 
Route::controller(CertificateController::class)->group(function() {
     Route::get('/certificate', 'index')->name('admin.certificatelist');
     Route::get('/certificate-list/{id}', 'form')->name('admin.certificate');
     Route::post('certificate-store','store')->name('admin.certificate.store');
     Route::post('certificate/delete/{id}', 'delete')->name('admin.certificate.delete');
     Route::get('/show-certificate/{id}','showCertificate')->name('admin.show.certificate');
     Route::get('/download-certificate/{id}','downloadCertificate')->name('admin.certificate.downloadPDF');
});



// Category
Route::controller(CategoryController::class)->group(function() {
     Route::get('/category-list', 'index')->name('admin.category');
     Route::get('/category-list/{status}', 'index')->name('admin.category.status'); 
     Route::get('/category-add', 'category_form')->name('admin.category_form.add');  
     Route::get('/category-edit/{id}', 'category_form')->name('admin.category_form.edit'); 
     Route::post('category-store','category_store')->name('admin.category_store');
     Route::post('category/delete/{id}', 'delete')->name('admin.category.delete');
});

// subCategory
Route::controller(SubCategoryController::class)->group(function() {
     Route::get('/subcategory-list', 'index')->name('admin.subcategory');
     Route::get('/subcategory-list/{status}', 'index')->name('admin.subcategory.status'); 
     Route::get('/subcategory-add', 'subcategory_form')->name('admin.subcategory_form.add');  
     Route::get('/subcategory-edit/{id}', 'subcategory_form')->name('admin.subcategory_form.edit'); 
     Route::post('subcategory-store','subcategory_store')->name('admin.subcategory_store');
     Route::post('subcategory/delete/{id}', 'delete')->name('admin.subcategory.delete');
     Route::post('fetchSubcategory', 'fetchSubcategory');
});

// course
Route::controller(CourseController::class)->group(function() {
     Route::get('/course/list', 'index')->name('admin.course');
     Route::get('/course/list/{status}', 'index')->name('admin.course.status'); 
     Route::get('/course/add', 'form')->name('admin.course.add');  
     Route::get('/course/edit/{id}', 'form')->name('admin.course.edit'); 
     Route::post('course/store','store')->name('admin.course.store');
     Route::post('course/delete/{id}', 'delete')->name('admin.course.delete');
});



// Enquiry
Route::controller(EnquiryController::class)->group(function() {
     Route::get('/enquiry-list', 'index')->name('admin.enquiry');
     Route::get('/enquiry-list/{status}', 'index')->name('admin.enquiry.status'); 
     Route::get('/enquiry-add', 'enquiry_form')->name('admin.enquiry_form.add');  
     Route::get('/enquiry-edit/{id}', 'enquiry_form')->name('admin.enquiry_form.edit'); 
     Route::post('enquiry-store','enquiry_store')->name('admin.enquiry_store');
     Route::post('enquiry/delete/{id}', 'delete')->name('admin.enquiry.delete');
     Route::get('/enquiry/contact/list', 'contact_list')->name('admin.contactus.list');
     
     Route::get('/enquiry/{type}', 'contact_list')->name('admin.joinus.list');
});
// service
Route::controller(ServiceController::class)->group(function() {
     Route::get('/projects/list', 'index')->name('admin.service');
     Route::get('/projects/list/{status}', 'index')->name('admin.service.status'); 
     Route::get('/projects/add', 'form')->name('admin.service.add');  
     Route::get('/projects/edit/{id}', 'form')->name('admin.service.edit'); 
     Route::post('projects/store','store')->name('admin.service.store');
     Route::post('projects/delete/{id}', 'delete')->name('admin.service.delete');
});

// slider
Route::controller(SliderController::class)->group(function() {
     Route::get('/slider/list', 'index')->name('admin.slider');
     Route::get('/slider/list/{status}', 'index')->name('admin.slider.status'); 
     Route::get('/slider/add', 'form')->name('admin.slider.add');  
     Route::get('/slider/edit/{id}', 'form')->name('admin.slider.edit'); 
     Route::post('slider/store','store')->name('admin.slider.store');
     Route::post('slider/delete/{id}', 'delete')->name('admin.slider.delete');
});

// gallery
Route::controller(GalleryController::class)->group(function() {
     Route::get('/gallery/list', 'index')->name('admin.gallery');
     Route::get('/gallery/list/{status}', 'index')->name('admin.gallery.status'); 
     Route::get('/gallery/add', 'addform')->name('admin.gallery.add');
     Route::get('/gallery/add/{type}', 'addform');  
     Route::get('/gallery/edit/{id}', 'form')->name('admin.gallery.edit'); 
     Route::post('gallery/store','store')->name('admin.gallery.store');
     Route::post('gallery/multistore','multistore')->name('admin.gallery.multistore');
     Route::post('gallery/delete/{id}', 'delete')->name('admin.gallery.delete');
     
     
     Route::get('/partner', 'partner')->name('admin.partner');
     Route::get('/partner/edit/{id}', 'partner')->name('admin.partner.edit');
     Route::post('partner/store','partnerStore')->name('admin.partner.store');
     
     
});

// event
Route::controller(EventController::class)->group(function() {
     Route::get('/event/list', 'index')->name('admin.event');
     Route::get('/event/list/{status}', 'index')->name('admin.event.status'); 
     Route::get('/event/add', 'form')->name('admin.event.add');  
     Route::get('/event/edit/{id}', 'form')->name('admin.event.edit'); 
     Route::post('event/store','store')->name('admin.event.store');
     Route::post('event/delete/{id}', 'delete')->name('admin.event.delete');
     
     Route::get('/event/images/list/{slug}', 'eventImages')->name('admin.events.list');
     Route::get('/event/add/images/{id}', 'addform')->name('admin.event.image');
     Route::post('event/multistore','multistore')->name('admin.event.multistore');
});

// InitiativeController

Route::controller(InitiativeController::class)->group(function() {
     Route::get('/initiative/list', 'index')->name('admin.initiative');
     Route::get('/initiative/list/{status}', 'index')->name('admin.initiative.status'); 
     Route::get('/initiative/add', 'form')->name('admin.initiative.add');  
     Route::get('/initiative/edit/{id}', 'form')->name('admin.initiative.edit'); 
     Route::post('initiative/store','store')->name('admin.initiative.store');
     Route::post('initiative/delete/{id}', 'delete')->name('admin.initiative.delete');
     
     Route::get('/initiative/images/list/{slug}', 'initiativeImages')->name('admin.initiative.list');
     Route::get('/initiative/add/images/{id}', 'addform')->name('admin.initiative.image');
     Route::post('initiative/multistore','multistore')->name('admin.initiative.multistore');
});
// ActivityController
Route::controller(ActivityController::class)->group(function() {
     Route::get('/activity/list', 'index')->name('admin.activity');
     Route::get('/activity/list/{status}', 'index')->name('admin.activity.status'); 
     Route::get('/activity/add', 'form')->name('admin.activity.add');  
     Route::get('/activity/edit/{id}', 'form')->name('admin.activity.edit'); 
     Route::post('activity/store','store')->name('admin.activity.store');
     Route::post('activity/delete/{id}', 'delete')->name('admin.activity.delete');
     
});

// donation
Route::controller(DonationController::class)->group(function() {
     Route::get('/donation/list', 'index')->name('admin.donation');
     Route::get('/donation/list/{status}', 'index')->name('admin.donation.status'); 
     Route::get('/donation/add', 'form')->name('admin.donation.add');  
     Route::get('/donation/edit/{id}', 'form')->name('admin.donation.edit'); 
     Route::post('donation/store','store')->name('admin.donation.store');
     Route::post('donation/delete/{id}', 'delete')->name('admin.donation.delete');
});

// award
Route::controller(AwardController::class)->group(function() {
     Route::get('/award/list', 'index')->name('admin.award');
     Route::get('/award/list/{status}', 'index')->name('admin.award.status'); 
     Route::get('/award/add', 'form')->name('admin.award.add');  
     Route::get('/award/edit/{id}', 'form')->name('admin.award.edit'); 
     Route::post('award/store','store')->name('admin.award.store');
     Route::post('award/delete/{id}', 'delete')->name('admin.award.delete');
});


// video gallery
Route::controller(VideoController::class)->group(function() {
     Route::get('/videos/list', 'index')->name('admin.videos');
     Route::get('/videos/list/{status}', 'index')->name('admin.videos.status'); 
     Route::get('/videos/add', 'form')->name('admin.videos.add');  
     Route::get('/videos/edit/{id}', 'form')->name('admin.videos.edit'); 
     Route::post('videos/store','store')->name('admin.videos.store');
     Route::post('videos/delete/{id}', 'delete')->name('admin.videos.delete');
});

// blogs
Route::controller(BlogsController::class)->group(function() {
     Route::get('/blogs/list', 'index')->name('admin.blogs');
     Route::get('/blogs/list/{status}', 'index')->name('admin.blogs.status'); 
     Route::get('/blogs/add', 'form')->name('admin.blogs.add');  
     Route::get('/blogs/edit/{id}', 'form')->name('admin.blogs.edit'); 
     Route::post('blogs/store','store')->name('admin.blogs.store');
     Route::post('blogs/delete/{id}', 'delete')->name('admin.blogs.delete');
});


// TestimonialsController
Route::controller(TestimonialsController::class)->group(function() {
     Route::get('/testimonials/list', 'index')->name('admin.testimonials');
     Route::get('/testimonials/list/{status}', 'index')->name('admin.testimonials.status'); 
     Route::get('/testimonials/add', 'form')->name('admin.testimonials.add');  
     Route::get('/testimonials/edit/{id}', 'form')->name('admin.testimonials.edit'); 
     Route::post('testimonials/store','store')->name('admin.testimonials.store');
     Route::post('testimonials/delete/{id}', 'delete')->name('admin.testimonials.delete');
});

//TeamController
Route::controller(TeamController::class)->group(function() {
     Route::get('/team/list', 'index')->name('admin.team');
     Route::get('/team/list/{status}', 'index')->name('admin.team.status'); 
     Route::get('/team/add', 'form')->name('admin.team.add');  
     Route::get('/team/edit/{id}', 'form')->name('admin.team.edit'); 
     Route::post('team/store','store')->name('admin.team.store');
     Route::post('team/delete/{id}', 'delete')->name('admin.team.delete');
});
//JobController
Route::controller(JobController::class)->group(function() {
     Route::get('/job/list', 'index')->name('admin.job');
     Route::get('/job/list/{status}', 'index')->name('admin.job.status'); 
     Route::get('/job/add', 'form')->name('admin.job.add');  
     Route::get('/job/edit/{id}', 'form')->name('admin.job.edit'); 
     Route::post('job/store','store')->name('admin.job.store');
     Route::post('job/delete/{id}', 'delete')->name('admin.job.delete');
     Route::get('/applicant/list', 'applicantList')->name('admin.applicant');
     Route::post('applicant/delete/{id}', 'applicant_delete')->name('admin.applicant.delete');
});

//AlbumController
Route::controller(AlbumController::class)->group(function() {
     Route::get('/album/list', 'index')->name('admin.album');
     Route::get('/album/list/{status}', 'index')->name('admin.album.status'); 
     Route::get('/album/add', 'form')->name('admin.album.add');  
     Route::get('/album/edit/{id}', 'form')->name('admin.album.edit'); 
     Route::post('album/store','store')->name('admin.album.store');
     Route::post('album/delete/{id}', 'delete')->name('admin.album.delete');
});

// CaseListController 
Route::controller(CaseListController::class)->group(function() {
     Route::get('/cases/list', 'index')->name('admin.cases');
     Route::get('/cases/list/{status}', 'index')->name('admin.cases.status'); 
     Route::get('/cases/add', 'form')->name('admin.cases.add');  
     Route::get('/cases/edit/{id}', 'form')->name('admin.cases.edit'); 
     Route::post('cases/store','store')->name('admin.cases.store');
     Route::post('cases/delete/{id}', 'delete')->name('admin.cases.delete');
     Route::get('cases/testimonials/{id}', 'testimonials')->name('admin.cases.testimonial');
});
// end 
// PageController
Route::controller(PageController::class)->group(function() {
     Route::get('/page/list', 'index')->name('admin.page');
     Route::get('/page/list/{status}', 'index')->name('admin.page.status'); 
     Route::get('/page/{type}', 'form')->name('admin.pages');   
     Route::get('/page/add', 'form')->name('admin.page.add');  
     Route::get('/page/edit/{id}', 'form')->name('admin.page.edit'); 
     Route::post('page/store','store')->name('admin.page.store');
     Route::get('/page/edit-card/{type}', 'editCard')->name('admin.page.editCard'); 
    
});

// SeoController
Route::controller(SeoController::class)->group(function() {
     Route::get('/seo', 'index')->name('admin.seo');
     Route::get('/seo/edit/{id}', 'form')->name('admin.seo.edit'); 
     Route::post('seo/store','store')->name('admin.seo.store');
});


// setting
Route::controller(GeneralSettingController::class)->group(function() {
     Route::get('/setting', 'index')->name('admin.setting');
     Route::get('/setting/donate', 'donateSection')->name('admin.donate.setting');
     Route::post('setting/store','store')->name('admin.general.store');
     Route::post('setting/donate/store','donatestore')->name('admin.donate.store');
});

// payment gatway integration 

Route::controller(PaymentSettingController::class)->group(function() {
    Route::get('/setting/payment', 'payment')->name('back.setting.payment');
    Route::post('/setting/payment/update', 'update')->name('back.setting.payment.update');
    });
    
});