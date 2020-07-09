@extends('./back_end/layout')
@section('header_name',"Category")
@section('header_name',"Category")
@section('content')

<h3>Sửa Danh Mục Sản Phẩm</h3>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" hidden>
                    <label>ID<span class="text-danger">*</span></label>
                    <input  type="text" class="form-control" name="id" value="{{$data->id}}">
                </div>
                <div class="form-group">
                    <label>Tên loại danh mục<span class="text-danger">*</span></label>
                    <input  type="text" class="form-control" name="txt_name" value="{{$data->name}}">
                </div>
            </div>
            <div class="col-12 justify-content-end">
                <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
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
			},
		},messages: {
			"txt_name": {
				required: "Hãy nhập tên danh mục*",
			}
		}
	});
});
</script>
@endsection