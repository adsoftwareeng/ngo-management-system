 @extends('layouts.master_frontend')
@section('content')  
  <!-- Breadcrumbs-->
      <section class="breadcrumbs-custom bg-image" style="background-image: url({{asset('public/uploads/general/'.generalSetting()->breadcrumbs)}});">
        <div class="container">
          <p class="heading-2 text-bold text-uppercase breadcrumbs-custom-title">Enquiry Now</p>
          <ul class="breadcrumbs-custom-path">
            <li><a href="{{url('/')}}">Home</a></li>
            <!-- <li><a href="#">Pages</a></li> -->
            <li class="active">Enquiry Now</li>
          </ul>
        </div>
      </section>


      <!-- Contact information-->
      <section class="section section-lg bg-default">
        <div class="container container-bigger">
          <div class="row row-ten row-50 justify-content-md-center justify-content-xl-between">
            <div class="col-md-9 col-lg-6">
              <h2 class="text-primary text-uppercase">Enquiry Now</h2>
              <hr class="divider divider-2 divider-left divider-default">
              <form class="" action="{{ route('enquiry.post')}}" method="post">
                 @csrf
                <div class="row mt-4">
                    <div class="col-sm-12 form-group">
                        
                    <label class="form-label-outside text-bold">Booking Date</label>
                      <input class="form-control p-3 borderRadius w-100" type="date" name="booking_date" placeholder="Booking Date : DD/MM/YY">
                  </div>
                  <div class="col-sm-12 form-group">
                    <label class="form-label-outside text-bold">Name</label>
                    <!--<div class="form-wrap form-wrap-inline">-->
                      <input class="form-control p-3 borderRadius" type="text" name="name" placeholder="">
                      <!-- <label class="form-label" for="forms-current-from">Enter your name</label> -->
                    <!--</div>-->
                  </div>
                  <div class="col-sm-12 form-group">
                    <label class="form-label-outside text-bold">Email</label>
                    <!--<div class="form-wrap form-wrap-inline">-->
                      <input class="form-control p-3 borderRadius" id="forms-current-to" type="text" name="email" placeholder="">
                      <!-- <label class="form-label" for="forms-current-to">Type your e-mail</label> -->
                    <!--</div>-->
                  </div>
                  <div class="col-sm-12 form-group">
                    <label class="form-label-outside text-bold">Phone</label>
                    <!--<div class="form-wrap form-wrap-inline">-->
                      <input class="form-control p-3 borderRadius" id="forms-current-to-2" type="text" name="phone" placeholder="">
                      <!-- <label class="form-label" for="forms-current-to-2">Your phone</label> -->
                    <!--</div>-->
                  </div>
                    @if(!empty(ourServices(1)) && count(ourServices(5))>0)
                  <div class="col-sm-12 form-group">
                    <label class="form-label-outside text-bold">Choose Service</label>
                    <!--<div class="form-wrap form-wrap-inline">-->
                      <select class="form-control p-3 borderRadius" name="service">
                          <option value="" selected disabled>Choose Service</option>
                         
                              @foreach(ourServices(1) as $serviceOur)
                              <option value="{{$serviceOur->id}}">{{$serviceOur->title}}</option>
                              @endforeach
                          
                      </select>
                      <!-- <label class="form-label" for="forms-current-to-2">Your phone</label> -->
                    <!--</div>-->
                  </div>
                     @endif
                  <div class="col-sm-6 form-group mt-2">
                    <label class="form-label-outside text-bold">Adults</label>
                    <div class="form-wrap form-wrap-modern">
                      <input class="form-control p-3 borderRadius input-append" id="form-element-stepper" name="adults" type="number" min="0" max="300" value="2">
                    </div>
                  </div>
                  <div class="col-lg-6 form-group mt-2">
                    <label class="form-label-outside text-bold">Children</label>
                    <div class="form-wrap form-wrap-modern">
                      <input class="form-control p-3 borderRadius input-append" name="children" id="form-element-stepper-1" type="number" min="0" max="300" value="0">
                    </div>
                  </div>
                </div>
                <div class="form-wrap form-button pull-center text-center">
                  <button class="button button-secondary button-nina button-default-outline" type="submit">book now</button>
                </div>
              </form>
             </div>
            <div class="col-md-9 col-lg-4 col-xl-3">
              <div class="column-aside">
                <div class="row">
                  <div class="col-sm-10 col-md-6 col-lg-12">
                    <h6>Address</h6>
                    <hr class="divider-thin divider-2">
                    <article class="box-inline"><span class="icon novi-icon icon-md-smaller icon-primary mdi mdi-map-marker"></span><span><a href="#">2130 Fulton Street, Chicago, IL <br class="d-none d-xl-block"> 94117-1080 USA</a></span></article>
                  </div>
                  <div class="col-sm-10 col-md-6 col-lg-12">
                    <h6>Phones</h6>
                    <hr class="divider-thin divider-2">
                    <article class="box-inline"><span class="icon novi-icon icon-md-smaller icon-primary mdi mdi-phone"></span>
                      <ul class="list-comma">
                        <li><a href="tel:#">1-800-6543-765</a></li>
                        <li><a href="tel:#">1-800-3434-876</a></li>
                      </ul>
                    </article>
                  </div>
                  <div class="col-sm-10 col-md-6 col-lg-12">
                    <h6>E-mail</h6>
                    <hr class="divider-thin divider-2">
                    <article class="box-inline"><span class="icon novi-icon icon-md-smaller icon-primary mdi mdi-email-open"></span><span><a href="mailto:#">maildemolink.org</a></span></article>
                  </div>
                  <div class="col-sm-10 col-md-6 col-lg-12">
                    <h6>Opening hours</h6>
                    <hr class="divider-thin divider-2">
                    <article class="box-inline"><span class="icon novi-icon icon-md-smaller icon-primary mdi mdi-calendar-clock"></span>
                      <ul class="list-0">
                        <li>Mon–Fri: 9:00 am–6:00 pm</li>
                        <li>Sat–Sun: 11:00 am–4:00 pm</li>
                      </ul>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection