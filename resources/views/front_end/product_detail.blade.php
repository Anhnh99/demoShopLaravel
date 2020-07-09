@extends('.front_end.layout')
@section('content')
<div class="maincontent bg--white pt--80 pb--55" style="margin-top: 40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="wn__fotorama__wrapper">
                                <!-- <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                    <img src= alt="">   
                                </div> -->
                                <img src={{asset($objPro->image)}} alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                        <form action="{{route('front-save-cart')}}" method="post">
                        @csrf
                            <div class="product__info__main">
                                <h1>{{ $objPro->name }}</h1><br>
                                <div class="price-box">
                                    <span>{{ $objPro->price }} đ</span><br>
                                </div>
                                <div>
                                    <span >Tình trạng : 
                                    @if($objPro->quantity > 0)
                                        <span style="color:#f15b67">Còn hàng</span> 
                                    @else
                                        <span style="color:#f15b67">Hết hàng</span>
                                    @endif
                                    </span>
                                </div>
                                <input type="hidden" name="productid_hidden" value="{{ $objPro->id }}">
                                <div class="box-tocart d-flex" style="margin-top: 30px">
                                    <span>Số Lượng</span>
                                    <input name="qty" id="qty" class="input-text qty" name="qty" min="1" value="1"  type="number">
                                    <div class="addtocart__actions">
                                        <button class="tocart" type="submit" title="">Thêm Vào Giỏ Hàng</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="product__info__detailed">
                    <div class="pro_details_nav nav justify-content-start" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Mô Tả Sản Phẩm</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Bình Luận</a>
                    </div>
                    <div class="tab__container">
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                            <div class="description__attribute">
                           
                                <ul>
                                    {!!$objPro->description!!}
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Tab Content -->
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                        <div>
                            @foreach($comment as $val)
                                @php
                                    $parent = $val->getNameUser();
                                @endphp
                                @if($parent !== false)
                                    <?= $parent->fullname?>
                                @endif

                                <p>{{$val->content}}</p>
                                @if(Auth::id()==$val->user_id)
                                    <form action="{{route('front-deleteComment',$val->id)}}" method="post">
                                    @csrf
                                        <button type="submit" class="btn btn-danger sm">xóa</button>
                                    </form>
                                @endif
                                
                                <br>
                            @endforeach
                            
                            
                        </div>
                            <form action="{{route('front-commentProduct',$objPro->id)}}" method="post">
                            @csrf
                                <div class="form-group">
                                
                                <input type="hidden" name="txt_product" value="{{$objPro->id}}">
                                <textarea class="form-control" name="txt_content" id="" rows="3"></textarea>
                                <button type="submit" class="btn btn-success">Bình Luận</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Tab Content -->
                    </div>
                </div>
                <section class="wn__product__area brown--color pt--80  pb--30">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section__title text-center">
                                        <h2>SẢN PHẨM LIÊN QUAN</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Tab Content -->
                            <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                                <!-- Start Single Product -->
                                @foreach($otherPro as $val)
                                <div class="product product__style--3">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                             <a class="first__img" href="{{route('front-productDetail',$val->id)}}">
                                            <img src={{asset($val->image)}} alt="product image"></a>
                                        </div>
                                        <div class="product__content ">
                                            <ul class="prize d-flex">
                                                <li>{{$val->price}}</li>
                                                <li class="old_prize">{{$val->price}} </li>
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
            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">DANH MỤC SẢN PHẨM</h3>

                        <ul>
                            @foreach($cate as $val)
                                <li><a href="{{route('front-product-cate',$val->id)}}">{{$val->name}}</a></li>
                            @endforeach       							
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    @if(Session::get('msg'))
    const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: 'success',
    title: '{{Session::get('msg')}}'
    })
    @endif
                    
</script>
@endsection