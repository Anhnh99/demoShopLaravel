<!DOCTYPE html>
<html lang="en">
  <head>
        @include('./back_end.admin_share.style')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Vascara</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <form action="{{route('search-product')}}" method="post">
          @csrf
            <input class="app-search__input" type="search" name="txt_text" placeholder="Search">
            <button class="app-search__button" type="subit"><i class="fa fa-search"></i></button>
          </form>
        </li>
        <!-- User Menu-->
        <li style="margin-top:15px">
        @if (Auth::check())
            Hi bro <li style="color:white;margin-top:15px">&nbsp {{Auth::user()->fullname}}</li>&nbsp  &nbsp
            <li style="color:white;margin-top:15px"><a href="{{route('Auth-Logout')}}" style="color:white">/  ĐĂNG XUẤT</a></li>
        @endif
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        @include('./back_end.admin_share.sidebar')
    <main class="app-content">
        @include('./back_end.admin_share.header')
        @yield('content')
    </main>
    @include('./back_end.admin_share.script')
    @yield('script')
  </body>
</html>