@extends('layouts.master_frontend')
@section('content')  
@include('partials.banner')


	<!-- OUR GALLERY -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
                @if(!empty($course))
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="tablebgColor">
                                <tr>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Course Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach($course as $enq)
                            <tr>
                                <td> <i class="fa fa-book"></i> {{$enq->title}}</td>
                                <td>{{$enq->duration}}</td>
                            </tr>
                        @endforeach
                            </tbody>
                            </table>
                        </div>
                    @endif
                        <!--  -->
                        <div class="col-md-8">
                                <h2 class="section-heading">
                                    संस्था में अन्य कोर्स भी उपलब्ध है जानकारी के लिए संपर्क करे
                                </h2>
                                <div class="margin-bottom-50"></div>

                                <div class="content">
                                    <form  class="form-contact" action="{{ route('contactstore') }}" method="post">
                                            @csrf

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
                                            
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="p_phone" name="phone" placeholder="Enter Phone Number">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                             
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="p_phone" name="course" placeholder="Enter Course">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="p_message" class="form-control" name="message" rows="6" placeholder="Enter Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <div id="success"></div> -->
                                            <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                                        </div>
                                    </form>
                                    <div class="margin-bottom-50"></div>
                            </div>
                        
                        </div>
                <!--  -->
					</div>

				</div>

			</div>
		</div>
	</div>


@endsection