
<?php $__env->startSection('content'); ?>
  <!-- start page title -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <style>
        .select2-results__option i {
            margin-right: 10px;
        }
    </style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(generalSetting()->site_name); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"> <?php echo e($main_title); ?></a></li>
                    <li class="breadcrumb-item active"> <?php echo e($page_title); ?>  </li>
                </ol>
            </div>
            <h4 class="page-title"> <?php echo e($page_title); ?> </h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-title"> <?php echo e($page_title); ?>  </h4>
                </div>
               <div class="col-2">
                    <a href="<?php echo e(redirect()->getUrlGenerator()->previous()); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> GO Back</a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form  action="<?php echo e(route('admin.page.store')); ?>" method="post"    enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(isset($page)?$page->id:''); ?>">
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Video URL</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url"  class="form-control" value="<?php echo e(isset($page)?$page->url:old('url')); ?>" placeholder="Enter  URL">
                                    </div>
                                </div>
                                    <hr/>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Video URL 2</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url2"  class="form-control" value="<?php echo e(isset($page)?$page->url2:old('url2')); ?>" placeholder="Enter  URL2">
                                    </div>
                                </div>
                                    <hr/>
                                 <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Full Width Banner Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                      <img src="<?php echo e(asset('public/uploads/page/'.$page->image)); ?>" class="w-25 img-responsive">
                                    </div>
                                    
                                </div>
                                <hr/>
                                 
                                 <div class="form-group row">
                                    
                                <label class="col-md-2 col-form-label" for="example-email">2 Banner Image</label>
                                
                                    <div class="col-md-5">
                                      <input type="file" class="filestyle" name="image2[]" accept="image/*" data-input="false">
                                      <img src="<?php echo e(asset('public/uploads/page/'.$page->image)); ?>" class="w-25 img-responsive">
                                    </div>
                                    <div class="col-md-5">
                                      <input type="file" class="filestyle" name="image2[]" accept="image/*" data-input="false">
                                    </div>
                                </div>
                                    <hr/>
                                
                                 <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">3 Banner Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image3[]" accept="image/*" data-input="false">
                                       
                                    </div>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image3[]" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle" name="image3[]" accept="image/*" data-input="false">
                                    </div>
                                   
                                </div>
                                
                            <?php $description =  json_decode($page->description,true);
                             ?> 
                           
                                
                                   <hr/>
                              
                             <?php for($i=1; $i<=4; $i++): ?>
                                  
                                
                                 <div class="form-group row">
                                     
                                     <label class="col-md-2 col-form-label" for="example-range">Title <?php echo e($i); ?>

                                   </label>
                                    <div class="col-md-2">
                                      <input type="text" class="form-control" name="description[title<?php echo e($i); ?>]" value="<?php echo e(@$description['title'.$i]); ?>">
                                       
                                    </div>
                                    <label class="col-md-2 col-form-label" for="example-range">Counting Number 
                                   </label>
                                    <div class="col-md-2">
                                       <input class="form-control" placeholder="Enter Counting Number" name="description[number<?php echo e($i); ?>]" value="<?php echo e(@$description['number'.$i]); ?>">
                                    </div>
                                    
                                     <label class="col-md-2 col-form-label" for="example-range">Icon 
                                     
                                      (<span>Selected Icon : <i class="<?php echo e(@$description['icon'.$i]); ?>"></i></span>)
                                   </label>
                                    <div class="col-md-2">
                                     
                                      <select class="form-control iconSelect"  name="description[icon<?php echo e($i); ?>]">
                                          <option value="<?php echo e(@$description['icon'.$i]); ?>"><?php echo e(@$description['icon'.$i]); ?></option>
                                          
                                      </select>
                                       
                                    </div>
                                    
                                </div>
                             <hr/>
                              <?php endfor; ?>
                                 <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">PopUp Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="popup" accept="image/*" data-input="false">
                                      <img src="<?php echo e(asset('public/uploads/page/'.$page->popup)); ?>" class="w-25 img-responsive">
                                    </div>
                                    
                                </div>
                                
                              <hr/>
                              
                               <input type="hidden" name="title" value="home">
                               <input type="hidden" name="type" value="home">
                                
                                  <div class="form-group row pull-center text-center">
                                    <div class="col-md-12">
                                        <button  type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </form>

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
      <!-- End Form -->
    </div>
</div>
<!-- end row -->


 <script>
 const faIcons = [
    "fa-glass", "fa-music", "fa-search", "fa-envelope-o", "fa-heart", "fa-star", "fa-star-o",
    "fa-user", "fa-film", "fa-th-large", "fa-th", "fa-th-list", "fa-check", "fa-times",
    "fa-search-plus", "fa-search-minus", "fa-power-off", "fa-signal", "fa-cog", "fa-trash-o",
    "fa-home", "fa-file-o", "fa-clock-o", "fa-road", "fa-download", "fa-arrow-circle-o-down",
    "fa-arrow-circle-o-up", "fa-inbox", "fa-play-circle-o", "fa-repeat", "fa-refresh", "fa-list-alt",
    "fa-lock", "fa-flag", "fa-headphones", "fa-volume-off", "fa-volume-down", "fa-volume-up",
    "fa-qrcode", "fa-barcode", "fa-tag", "fa-tags", "fa-book", "fa-bookmark", "fa-print", "fa-camera",
    "fa-font", "fa-bold", "fa-italic", "fa-text-height", "fa-text-width", "fa-align-left", "fa-align-center",
    "fa-align-right", "fa-align-justify", "fa-list", "fa-outdent", "fa-indent", "fa-video-camera",
    "fa-image", "fa-pencil", "fa-map-marker", "fa-adjust", "fa-tint", "fa-edit", "fa-share-square-o",
    "fa-check-square-o", "fa-arrows", "fa-step-backward", "fa-fast-backward", "fa-backward",
    "fa-play", "fa-pause", "fa-stop", "fa-forward", "fa-fast-forward", "fa-step-forward",
    "fa-eject", "fa-chevron-left", "fa-chevron-right", "fa-plus-circle", "fa-minus-circle",
    "fa-times-circle", "fa-check-circle", "fa-question-circle", "fa-info-circle", "fa-crosshairs",
    "fa-times-circle-o", "fa-check-circle-o", "fa-ban", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up",
    "fa-arrow-down", "fa-share", "fa-expand", "fa-compress", "fa-plus", "fa-minus", "fa-asterisk",
    "fa-exclamation-circle", "fa-gift", "fa-leaf", "fa-fire", "fa-eye", "fa-eye-slash", "fa-exclamation-triangle",
    "fa-plane", "fa-calendar", "fa-random", "fa-comment", "fa-magnet", "fa-chevron-up",
    "fa-chevron-down", "fa-retweet", "fa-shopping-cart", "fa-folder", "fa-folder-open", "fa-arrows-v",
    "fa-arrows-h", "fa-bar-chart-o", "fa-twitter-square", "fa-facebook-square", "fa-camera-retro",
    "fa-key", "fa-cogs", "fa-comments", "fa-thumbs-o-up", "fa-thumbs-o-down", "fa-star-half",
    "fa-heart-o", "fa-sign-out", "fa-linkedin-square", "fa-thumb-tack", "fa-external-link", "fa-sign-in",
    "fa-trophy", "fa-github-square", "fa-upload", "fa-lemon-o", "fa-phone", "fa-square-o", "fa-bookmark-o",
    "fa-phone-square", "fa-twitter", "fa-facebook", "fa-github", "fa-unlock", "fa-credit-card", "fa-feed",
    "fa-hdd-o", "fa-bullhorn", "fa-bell", "fa-certificate", "fa-hand-o-right", "fa-hand-o-left",
    "fa-hand-o-up", "fa-hand-o-down", "fa-arrow-circle-left", "fa-arrow-circle-right",
    "fa-arrow-circle-up", "fa-arrow-circle-down", "fa-globe", "fa-wrench", "fa-tasks", "fa-filter",
    "fa-briefcase", "fa-arrows-alt", "fa-group", "fa-chain", "fa-cloud", "fa-flask", "fa-cut",
    "fa-copy", "fa-paperclip", "fa-save", "fa-square", "fa-navicon", "fa-list-ul", "fa-list-ol",
    "fa-strikethrough", "fa-underline", "fa-table", "fa-magic", "fa-truck", "fa-pinterest",
    "fa-pinterest-square", "fa-google-plus-square", "fa-google-plus", "fa-money", "fa-caret-down",
    "fa-caret-up", "fa-caret-left", "fa-caret-right", "fa-columns", "fa-unsorted", "fa-sort-down",
    "fa-sort-up", "fa-envelope", "fa-linkedin", "fa-rotate-left", "fa-legal", "fa-dashboard",
    "fa-comment-o", "fa-comments-o", "fa-bolt", "fa-sitemap", "fa-umbrella", "fa-paste", "fa-lightbulb-o",
    "fa-exchange", "fa-cloud-download", "fa-cloud-upload", "fa-user-md", "fa-stethoscope", "fa-suitcase",
    "fa-bell-o", "fa-coffee", "fa-cutlery", "fa-file-text-o", "fa-building-o", "fa-hospital-o",
    "fa-ambulance", "fa-medkit", "fa-fighter-jet", "fa-beer", "fa-users", "fa-male", "fa-h-square", "fa-plus-square"
];

    $(document).ready(function () {
      let $select = $(".iconSelect");

    // Populate the dropdown
    faIcons.forEach(icon => {
        let iconClass = `fa ${icon}`;
        let optionHtml = `<option value="${iconClass}">${icon}</option>`;
        $select.append(optionHtml);
    });

    // Initialize Select2 with icon rendering
    $select.select2({
        templateResult: function (option) {
            if (!option.id) return option.text;
            return $(`<span><i class="${option.id}"></i> ${option.text}</span>`);
        },
        templateSelection: function (option) {
            if (!option.id) return option.text;
            return $(`<span><i class="${option.id}"></i> ${option.text}</span>`);
        }
    });
    });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/admin/page/home.blade.php ENDPATH**/ ?>