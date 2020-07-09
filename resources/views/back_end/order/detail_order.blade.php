@extends('./back_end/layout')
@section('header_name',"Order-Detail")
@section('header_name',"Order-Detail")
@section('content')
<div class="container" style="margin-top:50px;background-color:white">
    <div class="row">
        <div class="col-6">
            <h4 style="text-align:center">Thông tin người mua</h4>
            <ul style="line-height:40px; font-size:16px">
                <li>
                    Họ và Tên :
                    @php
                    $parent= $order->getNameUser();
                    @endphp
                    @if($parent !== false)
                    <?= $parent->fullname; ?>
                    @endif
                </li>
                <li>Số điện thoại : {{$order->phonenumber}}</li>
                <li>Địa chỉ : {{$order->address}}</li>
                <li>Ghi chú : </li>
            </ul>
        </div>
        <div class="col-6">
            <h4 style="text-align:center">Chi tiết đơn hàng</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_detail as $val)
                    <tr>
                        <td>
                            @php
                                $parent= $val->getNameProduct();
                            @endphp
                            @if($parent !== false)
                                <?= $parent->name; ?>
                            @endif
                        </td>
                        <td>{{$val->quantity}}</td>
                        <td>
                        {{($val->quantity)*($val->price)}}
                        </td>
                    </tr>@endforeach
                    <!-- <tr>
                        <td>Tổng tiền</td>
                        <td colspan="2">                            
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <a class="btn btn-warning" href="{{route('back-order')}}" style="color:white;margin-left:40px;margin-bottom:20px" role="button">Quay Lại</a>
    </div>
</div>
@endsection