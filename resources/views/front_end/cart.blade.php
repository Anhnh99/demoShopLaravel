@extends('.front_end.layout')
@section('content')
<div class="cart-main-area section-padding--lg bg--white" style="margin-top:70px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <?php
                $content = Cart::content();
                ?>
                
                    <div class="table-content wnro__table table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Sản Phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số Lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $val)
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset($val->options->image)}}" width="100px" alt="product img"></a></td>
                                    <td class="product-name"><a href="#">{{$val->name}}</a></td>
                                    <td class="product-price"><span class="amount">{{number_format($val->price)}} đ</span></td>
                                    <td class="product-quantity">
                                            <form action="{{route('front-update-cart-quantity')}}" method="post">
                                                @csrf
                                                <input type="number" name="quantity_cart" value="{{$val->qty}}">
                                                <input type="hidden" name="rowId_cart" value="{{$val->rowId}}">
                                                <button type="submit" class="btn btn-success"> cập nhật</button>
                                            </form>
                                    </td>
                                    <td class="product-subtotal">
                                        <?php
                                        $subtotal = $val->price * $val->qty;
                                        echo number_format($subtotal) . '' . 'đ';
                                        ?>
                                    </td>
                                    <td class="product-remove"><a name="" id="" class="btn btn-danger" href="{{route('front-delete-cart',$val->rowId)}}" role="button" style="width:30px;height:40px;color:white;margin-left:10px">X</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="cartbox__total__area">
                    <div class="cartbox-total d-flex justify-content-between">
                        <ul class="cart__total__list">
                            <li>Tổng :</li>

                        </ul>
                        <ul class="cart__total__tk">
                            <li>{{Cart::subtotal()}}</li>

                        </ul>
                    </div>
                    @if( Cart::count()>0 )
                    <a name="" id="" class="btn btn-danger" href={{route('front-checkout')}} style="width:570px;height:50px;color:white;padding-top:12px" role="button">Thanh Toán</a>
                    @else 
                     <a name="" id="" class="btn btn-danger" href={{route('front-product')}} style="width:570px;height:50px;color:white;padding-top:12px" role="button">Tiếp tục mua hàng</a>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection