
<?php $__env->startSection('content'); ?> 
<style>
    .listStyle{
       list-style:none;
    }
    .txtColor{
        color:#FF7000;
    }
    
</style>
	<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- CONTENT -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					    
					<div class="col-sm-8 col-md-8">
						<h2 class="section-heading">
							Donate <span>Now</span>
						</h2>
						<p class="text-justify">
						    No act of kindness, no matter how big or small, is ever wasted. Even a small Contribution can support a Noble Cause.
						</p>
						<div class="margin-bottom-50"></div>

						<div class="content">
							<form  class="form-contact" action="<?php echo e(route('donatestore')); ?>" method="post">
                                       <?php echo csrf_field(); ?>

								<div class="row">
								    <div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="number" class="form-control" id="p_name" name="amount" placeholder="Enter Amount" >
											<div class="help-block with-errors"></div>
										</div>
									</div>
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
									
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="p_phone" name="phone" placeholder="Enter Phone Number">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									
										<div class="col-sm-12 col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="p_phone" name="pan_no" placeholder="Enter PAN No">
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
								     <textarea id="p_message" class="form-control" name="address" rows="6" placeholder="Enter Address"></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
								    <select class="form-control" name="payment_method" id="payment_method">
								        <option value="" selected disabled> Select Payment Method</option>
								        <?php if(!empty($payments) && count($payments)>0): ?>
								        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								        <option value="<?php echo e($pay->unique_keyword); ?>"><?php echo e($pay->name); ?></option>
								        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								        <?php endif; ?>
								    </select>
								</div>
								<!---->
						 <div class="form-group<?php echo e($errors->has('captcha') ? ' has-error' : ''); ?> row">

                      <!--<label for="password" class="col-md-4 control-label">Captcha</label>-->

                    
                      <div class="col-md-6 mb-3">
                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                          <?php if($errors->has('captcha')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('captcha')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>

                      <div class="col-md-6">
                          <div class="captcha">
                          <span style="border:2px solid #eeee"><?php echo captcha_img('math'); ?></span>
                          <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                          </div>
                      </div>
                      
                      
                  </div>
                  
                  
								<!---->
								<div class="form-group">
									<!-- <div id="success"></div> -->
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
							<div class="margin-bottom-50"></div>
					 </div>
					</div>
				
					<div class="col-sm-4 col-md-4">
						<h3 class="text-dark">
                             Our Bank Details
						</h3>
                        <p><B>Anand Shakti Trust </B><br/> 
                        <b>Bank Name:</b> <?php echo e(generalSetting()->bank_name); ?> <Br/>
                        <b>IFSC:</b> BDBL0002096     <br/>
                        <b>Account Number:</b>  <?php echo e(generalSetting()->account_no); ?><br/>
                        <b>Account Name :</b> <?php echo e(generalSetting()->account_name); ?><br/>
                        <b>Branch Name :</b> <?php echo e(generalSetting()->branch_name); ?><br/>
                        </p>
                        
                        <h3 class="text-dark">
                             Donate using QR
						</h3>
                        
						<img src="<?php echo e(asset('public/uploads/general/'.generalSetting()->donate_image)); ?>" class="img-fluid w-100">
						<div class="spacer-90"></div>
					<!---->
					</div>
					<div class="clearfix"></div>
					
					
				</div>	
			</div>
		</div>
	</div>	
	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/donate.blade.php ENDPATH**/ ?>