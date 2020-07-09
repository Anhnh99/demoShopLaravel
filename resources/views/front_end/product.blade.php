@extends('.front_end.layout')
@section('content')
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg" style="margin-top: 40px">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
				<div class="shop__sidebar">
					<aside class="wedget__categories poroduct--cat">
						<h3 class="wedget__title">DANH MỤC SẢN PHẨM</h3>
						<ul>
							@foreach($listCate as $val)
							<li><a href="{{route('front-product-cate',$val->id)}}">{{$val->name}}</a></li>
							@endforeach
						</ul>
					</aside>
				</div>
			</div>
			<div class="col-lg-9 col-12 order-1 order-lg-2">
				<div class="row">
					<div class="col-lg-12">
						<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
							<div class="shop__list nav justify-content-center" role="tablist">
								<a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
							</div>
							
							<div class="orderby__wrapper">
								<span>Bộ Lọc</span>
								<select class="shot__byselect">
									<option>Mặc Định</option>
									<option>Giá cao->thấp</option>
									<option>Giá thấp->cao</option>
									<option>Tên A-Z</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="tab__container">
					<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
						<div class="row">
							<!-- Start Single Product -->
							@foreach($listPro as $val)
							<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
								<div class="product__thumb">
									<a class="first__img" href="{{route('front-productDetail',$val->id)}}"><img src={{asset($val->image)}} alt="product image"></a>
								</div>
								<div class="product__content ">
									<h4><a href="{{route('front-productDetail',$val->id)}}">{{$val->name}}</a></h4>
									<ul class="prize d-flex">
										@if( $val->discount_price == 0)
											<li>{{$val->price}} đ</li>
										@else
										<li>{{$val->price}} đ</li>
										<li class="old_prize">{{$val->discount_price}} đ</li>
										@endif
									</ul>
								</div>
							</div>
							@endforeach
							<!-- End Single Product -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection