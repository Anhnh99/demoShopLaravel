@extends('./back_end/layout')
@section('header_name',"Category")
@section('header_name',"Category")
@section('content')
<form id="myform" action="" method="POST">
          @csrf
        <h3>Thêm mới danh mục</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên danh mục sản phẩm<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="txt_name" >
                </div>
            </div><br>
            <div class="col-12 justify-content-end">
                <button class="btn btn-primary" type="submit" >Lưu</button>&nbsp;
                <a href="{{route('back-category')}}">Hủy</a>
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
                }

            },messages: {
                "txt_name": {
                    required: "Hãy nhập tên danh mục*",
                }
            }
        });
    });
</script>
@endsection