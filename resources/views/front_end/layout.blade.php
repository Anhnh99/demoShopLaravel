<!doctype html>
<html class="no-js" lang="zxx">
<head>
	@include('./front_end.element_layout.header')
</head>
<body>
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="{{route('front-home')}}">
								<img style="width:50%; " src={{asset('assets/front-end/images/logo/logo-share.png')}} alt="logo images">
							</a>
						</div>
					</div>
@include('./front_end.element_layout.menu_left')
@include('./front_end.element_layout.menu_right')	
		
				</div>

			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Nhập tên sản phẩm bạn muốn tìm...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>Thoát</span>
			</div>
		</div>
<!-- ---content---- -->
<!-- ---content---- -->
		@yield('content');

		<hr>
		@include('front_end.element_layout.footer')
		<!-- //Footer Area -->
	</div>
	<!-- JS Files -->
	@include('front_end.element_layout.script')
	@yield('script');

	
</body>
</html>