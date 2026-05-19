<!-- BANNER -->
<div class="section banner-page" data-background="{{asset('public/uploads/general/'.generalSetting()->breadcrumbs)}}">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page">{{$page_title}}</div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>


