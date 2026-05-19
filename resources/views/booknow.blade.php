 @extends('layouts.master_frontend')
@section('content')  

<div class="inner-banner">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-lg-7 col-md-7">
<div class="inner-title">
<h3>Appointment</h3>
<ul>
<li>
<a href="{{route('home')}}">Home</a>
</li>
<li>Appointment</li>
</ul>
</div>
</div>
<div class="col-lg-5 col-md-5">
<!-- <div class="inner-img">
<img src="{{asset('frontend/images/inner-banner/inner-banner5.png')}}" alt="Inner Banner" />
</div> -->
</div>
</div>
</div>
</div>


<div class="booking-area-two pt-100 pb-70">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="book-img-two">
<img src="{{asset('public/uploads/general/'.generalSetting()->appointment_img)}}" alt="Book" />
<div class="book-shape1">
<img src="{{asset('public/frontend/images/book/book-shape.png')}}" alt="Book" />
</div>
</div>
</div>
<div class="col-lg-6">
<div class="booking-form pl-20">
<div class="section-title mb-45">
<span>For Your Service</span>
<h2>Book An Appointment</h2>
</div>
<form class="" action="{{ route('enquiry.post')}}" method="post">
       @csrf
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<input type="text" class="form-control" name="name" required data-error="Please Enter Your Name" placeholder="Your Name">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<input type="email" class="form-control" name="email" required data-error="Please Enter Your Email" placeholder="Your Email">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<input type="phone" class="form-control" name="phone" required data-error="Please Enter Your Phone number" placeholder="Phone number">
</div>
</div>

<div class="col-lg-6">
<div class="form-group">
<input type="text" id="datetimepicker" class="form-control" name="booking_date" required data-error="Please Enter Date" placeholder=" Enter Date">
</div>
</div>
  @if(!empty(ourServices(1)) && count(ourServices(5))>0)
  <div class="col-lg-6">
      <div class="form-group">
          <select class="form-select form-control" name="service">
            <option value="" selected disabled>Choose Service</option>
              @foreach(ourServices(1) as $serviceOur)
              <option value="{{$serviceOur->id}}">{{$serviceOur->title}}</option>
              @endforeach
          </select>
      </div>
  </div>
@endif
<div class="col-lg-6">
<div class="form-group">
<input class="form-control" id="form-element-stepper" name="adults" type="number" min="0" max="300" value="" placeholder="Enter number of  persons">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<textarea name="message" class="form-control" id="message" cols="30" rows="7" required data-error="Write your message" placeholder="Your Message"></textarea>
</div>
</div>
<div class="col-lg-12 col-md-12">
<button type="submit" class="default-btn">
Book Now
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

@endsection