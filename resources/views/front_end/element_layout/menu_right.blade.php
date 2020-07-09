<div class="col-md-6 col-sm-6 col-6 col-lg-4">
    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
        <li class="shop_search" style="margin-right: 25px"><a class="search__active" href="#"></a></li>
        <li class="shopcart"><a href="{{route('front-show-cart')}}"></a></li>
        <!-- <li class="setting__bar__icon"><a class="setting__active" href="#"></a></li> -->
        @if (Auth::check())
            Hi bro <li style="color:#f15b67">&nbsp {{Auth::user()->fullname}}</li>&nbsp / &nbsp
            <li><a href="{{route('Auth-Logout')}}">ĐĂNG XUẤT</a></li>
        @else
        <li><a href="{{route('Auth-Login')}}">ĐĂNG NHẬP</a></li> &nbsp / &nbsp
        <li><a href="{{route('Auth-register')}}">ĐĂNG KÝ</a></li>
        @endif
    </ul>
</div>