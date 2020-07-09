@extends('.front_end.layout')
@section('content')
<!-- End Search Popup -->
        <!-- Start Slider area -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 100px">
			<ol class="carousel-indicators">
			  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<img class="d-block w-100" src="./assets/front-end/images/bg/SUMMERKISSES_LP-BANNER_DESKTOP_1920X658.png" alt="First slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="./assets/front-end/images/bg/9361589179161.png" alt="Second slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="./assets/front-end/images/bg/8781578899051.png" alt="Third slide">
			  </div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2>SẢN PHẨM MỚI NHẤT</h2>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					@foreach($newPro as $val)
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{route('front-productDetail',$val->id)}}"><img src="{{$val->image}}" alt="product image"></a>
							</div>
							<div class="product__content ">
								<ul class="prize d-flex">
									@if( $val->discount_price == 0)
										<li>{{$val->price}} đ</li>
									@else
									<li>{{$val->price}} đ</li>
									<li class="old_prize">{{$val->discount_price}} đ</li>
									@endif
								</ul>
								<h4><a href="{{route('front-productDetail',$val->id)}}">{{$val->name}}</a></h4>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>




<!-- end new product -->
<!-- start SAN PHAM NOI BAT -->


		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2>SẢN PHẨM KHUYẾN MÃI</h2>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					@foreach($discountPro as $val)
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{route('front-productDetail',$val->id)}}"><img src="{{$val->image}}" alt="product image"></a>
							</div>
							<div class="product__content ">
								<ul class="prize d-flex">
									<li>{{$val->discount_price}} đ</li>
									<li class="old_prize">{{$val->price}} đ</li>
								</ul>
								<h4><a href="{{route('front-productDetail',$val->id)}}">{{$val->name}}</a></h4>
							</div>
						</div>
					</div>
					@endforeach
					<!-- end Single Product -->
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>


<!-- END SAN PHAM NOI BAT -->
<!-- START ALL PRODUCT -->

		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2>SẢN PHẨM</h2>
						</div>
					</div>
				</div>
				<div class="tab__container">
					<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
						<div class="row">
							<!-- Start Single Product -->
							@foreach($allPro as $val)
							<div class="product product__style--3 col-lg-3 col-md-3 col-sm-6 col-12">
								<div class="product__thumb">
									<a class="first__img" href="{{route('front-productDetail',$val->id)}}"><img src="{{$val->image}}" alt="product image"></a>
								</div>
								<div class="product__content">
									<ul class="prize d-flex">
									@if( $val->discount_price == 0)
										<li>{{$val->price}} đ</li>
									@else
									<li>{{$val->price}} đ </li>
									<li class="old_prize">{{$val->discount_price}} đ</li>
									@endif
									</ul>
									<h4><a href="{{route('front-productDetail',$val->id)}}">{{$val->name}}</a></h4>
								</div>
							</div>
							@endforeach
							<!-- End Single Product -->						
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2>TIN TỨC</h2>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">International activities of the Frankfurt Book </a></h3>
								<p>We are proud to announce the very first the edition of the frankfurt news.We are proud to announce the very first of  edition of the fault frankfurt news for us.</p>
								<div class="post__time">
									<span class="day">Dec 06, 18</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">Reading has a signficant info  number of benefits</a></h3>
								<p>Find all the information you need to ensure your experience.Find all the information you need to ensure your experience . Find all the information you of.</p>
								<div class="post__time">
									<span class="day">Mar 08, 18</span>
									<div class="post-meta">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">The London Book Fair is to be packed with exciting </a></h3>
								<p>The London Book Fair is the global area inon marketplace for rights negotiation.The year  London Book Fair is the global area inon forg marketplace for rights.</p>
								<div class="post__time">
									<span class="day">Nov 11, 18</span>
									<div class="post-meta">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
		<!-- Footer Area -->
@endsection
@section('script')
<script>
    @if(Session::get('msg'))
    Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: '{{Session::get('msg')}}',
        showConfirmButton: false,
        timer: 1500
    })
    @endif
</script>
@endsection