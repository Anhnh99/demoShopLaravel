@extends('.front_end.layout')
@section('content')
<section class="wn__checkout__area section-padding--lg bg__white" style="margin-top:50px">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="customer_details">

                    <h3>Chi Tiết Thanh Toán</h3>
                    @foreach($errors->all() as $e)
                    <p style="color: red">
                        @if(is_array($e))
                        {{implode('<br>',$e)}}
                        @else
                        {{$e}}
                        @endif
                    </p>
                    @endforeach
                    <div class="customar__field">
                        <form id="myform" action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Họ và Tên<span>*</span></label>
                                <input type="text" class="form-control" name="txt_name" value="{{ old('txt_name') }}">
                            </div>
                            <div class="form-group">
                                <label>Số Điện Thoại<span>*</span></label>
                                <input type="number" class="form-control" name="txt_phone" value="{{ old('txt_phone') }}">
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ <span>*</span></label>
                                <input type="text" class="form-control" name="txt_address" value="{{ old('txt_address') }}">
                            </div>
                            <div class="form-group">
                                <label>Ghi Chú</label>
                                <input type="text" class="form-control" name="txt_note" value="{{ old('txt_note') }}">
                            </div>
                            <button type="submit" class="btn btn-success">Hoàn Thành</button>
                        </form>
                    </div>


                </div>

            </div>
            <?php
            $content = Cart::content();
            ?>
            <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                <div class="wn__order__box">
                    <h3 class="onder__title">Đơn Hàng Của Bạn</h3>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $val)
                            <tr>
                                <td scope="row">{{$val->name}}</td>
                                <td>{{$val->qty}}</td>
                                <td>{{$val->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <ul class="total__amount">
                        <li>Tổng Tiền <span>{{Cart::subtotal()}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $().ready(function() {
        $("#myform").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "txt_name": {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                "txt_phone": {
                    required: true,
                    // phoneNumber: {
                    //     matches: "((09|03|07|08|05)+([0-9]{8})\b)/g",
                    // accept: "((09|03|07|08|05)+([0-9]{8})\b)/g";
                },
                "txt_address": {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },


            },
            messages: {
                "txt_name": {
                    required: "Hãy nhập họ và tên*",
                    maxlength: "Họ và tên quá dài",
                    minlength: "Họ và tên quá ngắn"
                },
                "txt_phone": {
                    required: "Hãy nhập số điện thoại*",
                    // accept:"sai"
                },
                "txt_address": {
                    required: "Hãy nhập địa chỉ*",
                    maxlength: "Địa chỉ quá dài",
                    minlength: "Địa chỉ quá ngắn"
                },
            }
        });
    });
</script>
@endsection