@extends('.front_end.layout')
@section('content')
<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-page">
                    <div class="page__header">
                        <h2>Danh Sách Bài Viết</h2>
                    </div>
                    <!-- Start Single Post -->
                    <article class="blog__post d-flex flex-wrap">
                        <div class="thumb">
                            <a href={{route('front-blogDetail')}}>
                                <img src= {{asset('assets/front-end/images/blog/blog-3/1.jpg')}} alt="blog images">
                            </a>
                        </div>
                        <div class="content">
                            <h4><a href={{route('front-blogDetail')}}>Tiêu đề bài viết</a></h4>
                            <ul class="post__meta">
                                <li>Mar 10 2018</li>
                            </ul>
                            <p>Nội dung ngắn</p>
                            <div class="blog__btn">
                                <a href={{route('front-blogDetail')}}>Xem Thêm</a>
                            </div>
                        </div>
                    </article>
                    <!-- End Single Post -->
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