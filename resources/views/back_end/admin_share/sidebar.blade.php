<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('assets/back-end/images/img.jpg')}}" style="width:50px;height:50px" alt="User Image">
      <div>
        <p class="app-sidebar__user-name">Hoang Anh</p>
        <p class="app-sidebar__user-designation">Frontend Developer </p>
      </div>
    </div>
    <ul class="app-menu">
      <!-- <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li> -->
      <li><a class="treeview-item" href="{{route('back-category')}}"><i class=" icon fa fa-copyright"></i>Danh Mục Sản Phẩm</a></li>
      <li><a class="treeview-item" href="{{route('back-product')}}"><i class="icon fa fa-list-ul"></i>Sản Phẩm</a></li>
      <li><a class="treeview-item" href="{{route('back-user')}}"><i class="fa fa-users"></i> &nbsp Tài Khoản</a></li>
      <li><a class="treeview-item" href="{{route('back-comment')}}"><i class="fa fa-comments"></i>&nbsp Bình Luận</a></li>
      <li><a class="treeview-item" href="{{route('back-order')}}"><i class="fa fa-tv"></i>&nbsp Đơn Hàng</a></li>


    </aside>