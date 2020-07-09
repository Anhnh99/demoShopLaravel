@extends('.front_end.layout')
@section('content')
<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="contact-form-wrap">
                <h2 class="contact__title">Gửi Email Liên Hệ</h2>

                <form id="myform" action="" method="post">
                @csrf
                    @foreach($errors->all() as $e)
                    <p style="color: red">
                        @if(is_array($e))
                        {{implode('<br>',$e)}}
                        @else
                        {{$e}}
                        @endif
                    </p>
                    @endforeach
                    <div class="form-group">
                        <label>Họ và Tên<span>*</span></label>
                        <input type="text" class="form-control" name="txt_name" value="{{old('txt_name')}}">
                    </div>
                    <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input type="text" class="form-control" name="txt_email" value="{{old('txt_email')}}">
                    </div>
                    <div class="form-group">
                        <label>Nội dung <span>*</span></label>
                        <input type="text" class="form-control" name="txt_content" value="{{old('txt_content')}}">
                    </div>
                    <button type="submit" class="btn btn-success">Gửi</button>
                </form>

            </div> 
        </div>
        <div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
            <div class="wn__address">
                <h2 class="contact__title">Thông Tin Website</h2>
                
                <div class="wn__addres__wreapper">

                    <div class="single__address">
                        <i class="icon-location-pin icons"></i>
                        <div class="content">
                            <span>Địa chỉ:</span>
                            <p>666 5th Ave New York, NY, United</p>
                        </div>
                    </div>

                    <div class="single__address">
                        <i class="icon-phone icons"></i>
                        <div class="content">
                            <span>Số điện thoại:</span>
                            <p>716-298-1822</p>
                        </div>
                    </div>

                    <div class="single__address">
                        <i class="icon-envelope icons"></i>
                        <div class="content">
                            <span>Email:</span>
                            <p>716-298-1822</p>
                        </div>
                    </div>

                    <div class="single__address">
                        <i class="icon-globe icons"></i>
                        <div class="content">
                            <span>website:</span>
                            <p>716-298-1822</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    @if(Session::get('msg'))
    Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: '{{Session::get('msg')}}',
        showConfirmButton: false,
        timer: 1500
    })
    @endif

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
                "txt_email": {
                    required: true,
                    email:true
                },
                "txt_content": {
                    required: true,
                },


            },
            messages: {
                "txt_name": {
                    required: "Hãy nhập họ và tên*",
                    maxlength: "Họ và tên quá dài",
                    minlength: "Họ và tên quá ngắn"
                },
                "txt_email": {
                    required: "Hãy nhập Email*",
                    email:"Hãy nhập đúng địa chỉ Email"
                },
                "txt_content": {
                    required: "Hãy nhập nội dunng gửi*", 
                },
                
            }
        });
    });
</script>
@endsection