@extends('layouts.master_frontend')
@section('content')  
  <!-- Breadcrumbs-->
     <section class="breadcrumbs-custom bg-image" style="background-image: url({{asset('public/uploads/general/'.generalSetting()->breadcrumbs)}});">
         <div class="container">
          <p class="heading-2 text-bold text-uppercase breadcrumbs-custom-title">{{$page_title}}
          </p>
          <ul class="breadcrumbs-custom-path">
            <li><a href="{{url('/')}}">Home</a></li>
            <!-- <li><a href="#">Pages</a></li> -->
            <li class="active">{{$page_title}}</li>
          </ul>
        </div>
      </section>


      <!-- Contact information-->
        <!-- hi, we are brave-->
      <section class="section section-lg bg-default">
        <div class="container container-bigger">
          <div class="row row-ten row-50 justify-content-md-center justify-content-xl-between flex-lg-row-reverse">
            <div class="col-md-12 col-lg-12 col-xl-12">
              <h2 class="text-primary text-uppercase">{{$about->title}}</h2>
              <hr/>
               {!!$about->description!!}
            </div>
          </div>
        </div>
      </section>
@endsection