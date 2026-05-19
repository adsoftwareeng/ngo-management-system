@extends('layouts.master_frontend')
@section('content') 
<style>
    .listStyle{
       list-style:none;
    }
    .txtColor{
        color:#FF7000;
    }
    
</style>
<!-- CONTENT -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					    
					<div class="col-sm-8 col-md-8">
						<h2 class="section-heading">
							{{$page_title}}
						</h2>
						<p class="text-danger ">Please don't refresh the page.</p>

						<div class="content border p-4">
							<form  action="{{ route('bankTransfer') }}" method="post">
                                       @csrf
                            <input type="hidden" name="donate" value="{{$donate}}">

								    <div class="form-group">
								        <label class="text-dark">Transaction Number</label>
											<input type="text" class="form-control" name="txn_id">
									
									</div>
									
								    <div class="form-group">
										<p class="text-dark">{!!$payments!!}</p>
									</div>
							
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
                        
                        <ul>
							<li class="listStyle"><i class="fa fa-arrow-right text-sm txtColor"></i> Bank Name : {{generalSetting()->bank_name}}</li>
							<li class="listStyle"><i class="fa fa-arrow-right text-sm txtColor"></i> Account Number : {{generalSetting()->account_no}}</li>
							<li class="listStyle"><i class="fa fa-arrow-right text-sm txtColor"></i> Account Name : {{generalSetting()->account_name}}</li>
							<li class="listStyle"><i class="fa fa-arrow-right text-sm txtColor"></i> Branch Name : {{generalSetting()->branch_name}}</li>
						</ul>
						<h3 class="text-dark">
                             Donate using QR
						</h3>
                        
						<img src="{{asset('public/uploads/general/'.generalSetting()->donate_image)}}" class="img-fluid w-50">
						<div class="spacer-90"></div>
					<!---->
					</div>
					<div class="clearfix"></div>
					
					
				</div>	
			</div>
		</div>
	</div>	
@endsection