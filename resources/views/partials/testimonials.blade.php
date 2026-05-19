 <!--=================================
    Testimonial -->
  @if(!empty($testimonial) && count($testimonial)>0)
     <div class="section" data-aos="fade-up" data-aos-duration="500">
  <div class="content-wrap pt-0 pb-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12">
          <h2 class="section-heading center">
             People <span>Love </span> Us
          </h2>
        </div>
        <!-- Owl Carousel Wrapper -->
        <div class="owl-carousel owl-theme testimonial-carousel">
          @foreach($testimonial as $clients)
          <div class="testimonial-1 item">
            <div class="media">
              <img src="{{asset('public/uploads/testimonials/'.$clients->image)}}" alt="" class="img-fluid">
            </div>
            <div class="body">
              <p class="text-justify">{{$clients->description}}</p>
              <div class="title">{{$clients->name}}</div>
              <div class="company">{{$clients->designation}}</div>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
    @endif
    <!--=================================
    Testimonial -->