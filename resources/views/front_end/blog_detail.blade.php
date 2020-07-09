@extends('.front_end.layout')
@section('content')
<div class="page-blog-details section-padding--lg bg--white" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-details content">
                    <article class="blog-post-details">
                        <div class="post-thumbnail">
                            <img src={{asset('assets/front-end/images/blog/big-img/1.jpg')}} alt="blog images">
                        </div>
                        <div class="post_wrapper">
                            <div class="post_header">
                                <h2>Tiêu đề bài viết</h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li>June 27, 2018</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post_content">
                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Crastoup pretium arcu ex. Aenean posuere libero eu augue rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut lectus fermentum eleifend. Pellentesque faucibus sem ante, non malesuada odio varius nec. Suspendisse potenti. Proin consectetur aliquam odio nec fringilla. Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit amet ligula condimentum sagittis.</p>

                                <blockquote>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor deo incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud geolans work.</blockquote>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehendrit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of to magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehnderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dser mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>

                            </div>
                        </div>
                    </article>
                   
                  
                </div>
            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="wn__sidebar">
                    <!-- Start Single Widget -->
                    <aside class="widget search_widget">
                        <h3 class="widget-title">Tìm Kiếm</h3>
                        <form action="#">
                            <div class="form-input">
                                <input type="text" placeholder="nhập...">
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget recent_widget">
                        <h3 class="widget-title">Gần Đây</h3>
                        <div class="recent-posts">
                            <ul>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img src= {{asset('assets/front-end/images/books/1.jpg')}} alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href={{route('front-blogDetail')}}>tiêu đề</a></h4>
                                            <p>	March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection