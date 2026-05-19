@extends('layouts.master_frontend')
@section('content')  

@include('partials.banner')
  <!-- main-area -->
  

   	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

                    <div class="col-xl-9 col-lg-8">
                        <div class="blog__details-wrapper">
                            <div class="blog__details-thumb">
                                <img src="{{asset('public/uploads/blogs/'.$blogs->image)}}" alt="{{$blogs->title}} Blog Details" class="img-responsive w-100">
                                <p class="mt-3 txtColor">
                                    <i class="flaticon-calendar"></i> 
                                 {{show_date($blogs->created_at)}}
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                
        						<h2 class="section-heading">
        							{!!split_title($blogs->title) !!}
        						</h2>
                		
        					</div>
                            <div class="blog__details-content">
                                
                                  {!!$blogs->description!!}
                               
                            </div>
                        </div>
                       
                    </div>
                      @if(!empty($other_blog) && count($other_blog)>0)
                      <div class="col-xl-3 col-lg-4">
                        <aside class="blog-sidebar">
                           
                            <div class="blog-widget">
                                <h4 class="widget-title">Other Blogs</h4>
                                <div class="shop-cat-list">
                                    <ul class="list-wrap">
                                       @foreach($other_blog as  $enq)
                                        <li>
                                            <a href="{{url('our-blogs/'.$enq->slug)}}"> 
                                                 <i class="flaticon-angle-right"></i> {{substr($enq->title,0,35)}}
                                            </a>
                                        </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <!-- main-area-end -->

@endsection