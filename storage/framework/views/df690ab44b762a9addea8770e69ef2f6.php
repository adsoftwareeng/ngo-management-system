
<?php $__env->startSection('content'); ?> 

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- CONTENT -->
<div class="section">
		<div class="">
			<div class="container">
				<div class="row">
					
					<div class="col-md-10 offset-md-1">
						<h2 class="section-heading">
						Join <span>Us</span>
						</h2>

						<div class="content">
							<form  class="form-contact" action="<?php echo e(route('joinstore')); ?>" method="post">
                                       <?php echo csrf_field(); ?>

								<div class="row">
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="p_name" name="name" placeholder="Enter Name" >
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="form-group col-md-6">
                                         <input text="text" id="dob" Placeholder="Date of Birth" class="form-control" name="dob">
	 								</div>
	 								<div class="form-group col-md-6">
                                        <select id="gender" class="form-control" name="gender">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>

	 								</div>
									<div class="form-group col-md-6">
										
											<input type="email" class="form-control" id="p_email" name="email" placeholder="Enter Email" >
										
									</div>
									
									<div class="col-md-12 form-group">
											<input type="text" class="form-control" id="p_phone" name="phone" placeholder="Enter Phone Number">
							
									</div>
									<div class="form-group col-md-6">
                                     <select name="state" class="form-control " aria-="true">
                					<option value="Select State*" selected="" disabled="">Select State*</option>
                					<option value="Andhra Pradesh">Andhra Pradesh</option>
                					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
                					<option value="Assam">Assam</option>
                					<option value="Bihar">Bihar</option>
                					<option value="Chhattisgarh">Chhattisgarh</option>
                					<option value="Delhi">Delhi</option>
                					<option value="Goa">Goa</option>
                					<option value="Gujarat">Gujarat</option>
                					<option value="Haryana">Haryana</option>
                					<option value="Himachal Pradesh">Himachal Pradesh</option>
                					<option value="Jharkhand">Jharkhand</option>
                					<option value="Karnataka">Karnataka</option>
                					<option value="Kerala">Kerala</option>
                					<option value="Madhya Pradesh">Madhya Pradesh</option>
                					<option value="Maharashtra">Maharashtra</option>
                					<option value="Manipur">Manipur</option>
                					<option value="Meghalaya">Meghalaya</option>
                					<option value="Mizoram">Mizoram</option>
                					<option value="Nagaland">Nagaland</option>
                					<option value="Odisha">Odisha</option>
                					<option value="Punjab">Punjab</option>
                					<option value="Rajasthan">Rajasthan</option>
                					<option value="Sikkim">Sikkim</option>
                					<option value="Tamil Nadu">Tamil Nadu</option>
                					<option value="Telangana">Telangana</option>
                					<option value="Tripura">Tripura</option>
                					<option value="Uttar Pradesh">Uttar Pradesh</option>
                					<option value="Uttarakhand">Uttarakhand</option>
                					<option value="West Bengal">West Bengal</option>
                							</select>
                                 </div>
								
								<div class="form-group col-md-6">
									 <input id="p_message" class="form-control" name="city"  placeholder="Enter City">
									<div class="help-block with-errors"></div>
								</div>
							
								<div class="form-group col-md-12">
									 <textarea id="p_message" class="form-control" name="message" rows="6" placeholder="Enter  Address"></textarea>
									<div class="help-block with-errors"></div>
								</div>
								
						
								
									<!---->
					 <div class="form-group<?php echo e($errors->has('captcha') ? ' has-error' : ''); ?> col-md-12">

                      <label for="password" class="col-md-4 control-label">Captcha</label>



                      <div class="col-md-6">

                          <div class="captcha  mb-4">

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
								<div class="form-group col-md-12">
									<!-- <div id="success"></div> -->
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
							<div class="margin-bottom-50"></div>
					 </div>
					</div>

           
				</div>
				
			</div>
		</div>
	</div>	

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/joinus.blade.php ENDPATH**/ ?>