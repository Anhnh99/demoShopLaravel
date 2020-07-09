@extends('./back_end/layout')
@section('header_name',"User")
@section('header_name',"user")
@section('content')
<form id="myform" action="" method="post">
          @csrf
        <h3>Thêm mới tài khoản</h3>
        @foreach($errors->all() as $e)
        <p style="color: red">
            @if(is_array($e))
            {{implode('<br>',$e)}}
            @else
            {{$e}}
            @endif
        </p>
        @endforeach
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên người dùng<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="txt_name" value="{{$data->fullname}}">
                </div>
                <div class="form-group" >
                    <label>Tài khoản :</label>
                    {{$data->account}}
                    <!-- <input type="text" class="form-control" name="txt_account" value="{{$data->account}}" > -->
                </div>
                <div class="form-group">
                    <label>Mật khẩu<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="txt_password" value="{{$data->password}}">
                </div>
                <div class="form-group">
                    <label>Vai trò <span class="text-danger">*</span></label>
                      <select class="form-control" name="txt_role" id="txt_role">
                        <option value= 1>1</option>
                        <option value= 0>0</option>
                      </select>
                </div>
            </div><br>
            <div class="col-12 justify-content-end">
                <button class="btn btn-primary" type="submit" >Lưu</button>&nbsp;
                <a href="{{route('back-user')}}">Hủy</a>
            </div>
        </div>
    </form>
@stop
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
                },
                "txt_password":{
                    required: true,
                },
            
            },messages: {
                "txt_name": {
                    required: "Hãy nhập tên người dùng*",
                },
                "txt_password": {
                    required: "Hãy nhập mật khẩu*",
                },
            }
        });
    });
// </script>
@endsection