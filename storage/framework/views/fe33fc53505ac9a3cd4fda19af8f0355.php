
<?php $__env->startSection('content'); ?> 

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- CONTENT -->
<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-8 col-md-8">
						<h2 class="section-heading">
							Send a <span>Message</span>
						</h2>
						<div class="margin-bottom-50"></div>

						<div class="content">
							<form  class="form-contact" action="<?php echo e(route('contactstore')); ?>" method="post">
                                       <?php echo csrf_field(); ?>

								<div class="row">
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="p_name" name="name" placeholder="Enter Name" >
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="email" class="form-control" id="p_email" name="email" placeholder="Enter Email" >
											<div class="help-block with-errors"></div>
										</div>
									</div>
									
									<div class="col-sm-12 col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="p_phone" name="phone" placeholder="Enter Phone Number">
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									 <textarea id="p_message" class="form-control" name="message" rows="6" placeholder="Enter Your Message"></textarea>
									<div class="help-block with-errors"></div>
								</div>
									<!---->
						 <div class="form-group<?php echo e($errors->has('captcha') ? ' has-error' : ''); ?>">

                      <label for="password" class="col-md-4 control-label">Captcha</label>



                      <div class="col-md-6">

                          <div class="captcha">

                          <span><?php echo captcha_img('math'); ?></span>

                          <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>

                          </div>

                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">



                          <?php if($errors->has('captcha')): ?>

                              <span class="help-block">

                                  <strong><?php echo e($errors->first('captcha')); ?></strong>

                              </span>

                          <?php endif; ?>

                      </div>

                  </div>
								<!---->
								<div class="form-group">
									<!-- <div id="success"></div> -->
									<button type="submit" class="btn btn-primary">SEND MESSAGE</button>
								</div>
							</form>
							<div class="margin-bottom-50"></div>
					 </div>
					</div>

                    <div class="col-sm-4 col-md-4">
						<h2 class="section-heading">
							Contact Details
						</h2>

						<div class="rs-icon-info">
							<div class="info-icon">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="info-text"><?php echo e(generalSetting()->address); ?></div>
						</div>

						<div class="rs-icon-info">
							<div class="info-icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="info-text">
                                <a href="mailto:<?php echo e(generalSetting()->email); ?>">
                                        <?php echo e(generalSetting()->email); ?>

                                </a>
                            </div>
						</div>

						<div class="rs-icon-info">
							<div class="info-icon">
								<i class="fa fa-phone"></i>
							</div>
							<div class="info-text"><a href="tel:<?php echo e(generalSetting()->phone); ?>"><?php echo e(generalSetting()->phone); ?></a></div>
						</div>

						
					</div>
           
				</div>
				
			</div>
		</div>
	</div>	

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/contactus.blade.php ENDPATH**/ ?>