@extends('./back_end/layout')
@section('header_name',"Category")
@section('header_name',"Category")
@section('content')
<form id="myform" action="" method="post"
          enctype="multipart/form-data">
          @csrf
        <h3>Thêm mới sản phẩm</h3>
        <div class="row">
                <div class="col-md-6">
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
                    <label for="">Danh mục<span class="text-danger">*</span></label>
                    <select name="txt_category" class="form-control">
                        @foreach($category as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên Sản Phẩm<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="txt_name" value="{{ old('txt_name') }}">
                </div>
                <div class="form-group">
                    <label>Giá<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="txt_price" value="{{ old('txt_price') }}">
                </div>
                <div class="form-group">
                    <label>Giá Giảm<span class="text-danger"></span></label>
                    <input type="number" class="form-control" name="txt_discount" value="{{ old('txt_discount') }}">
                </div>
                <div class="form-group">
                    <label>Số Lượng<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="txt_quantity" value="{{ old('txt_quantity') }}">
                </div>
                <div class="form-group">
                    <label>Mô Tả Sản Phẩm</label>
                    <textarea name="txt_description" id="editor1" rows="10" cols="80" value="{{ old('txt_description') }}">
                        
                    </textarea>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                    <input type="file" onchange="encodeImageFileAsURL(this)" class="form-control" name="txt_image">
                </div>
                <div class="col-8 offset-2">
                        <img id="preview-img" style="width:300px;height:400px" src="{{ old('txt_image') }}" class="img-fluid" >
                </div>
            </div>
            <div class="col-12 justify-content-end">
                <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
                <a name="" id="" class="btn btn-danger" href="{{route('back-product')}}" role="button">Hủy</a>
                
            </div>
        </div>
    </form>
@stop
@section('script')
<script>
    CKEDITOR.replace('editor1');
</script>
<script>
	function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $('#preview-img').attr('src', "http://localhost/Assignment_laravel/public/assets/back-end/images/img.jpg");
        }else{
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    $().ready(function() {
        $("#myform").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "txt_name": {
                    required: true,
                },
                "txt_price": {
                    required: true,
                    minlength: 1,

                },
                "txt_discount": {
                    required: true,
                    minlength: 1,
                },
                "txt_quantity": {
                    required: true,
                    minlength: 1,
                },
                "txt_image": {
                    required: true,
                    accept: "jpg|jpeg|png|JPG|JPEG|PNG"
                }
                

            },messages: {
                "txt_name": {
                    required: "Hãy nhập tên sản phẩm",
                },
                "txt_price": {
                    required: "Hãy nhập giá sản phẩm",
                    minlength: "Hãy nhập ít nhất 1 ký tự số",
                    maxlength: "Hãy nhập ít hơn 8 ký tự số" 
                },
                "txt_discount": {
                    required: "Hãy nhập giá giảm",
                    minlength: "Hãy nhập ít nhất 1 ký tự số",
                    maxlength: "Hãy nhập ít hơn 8 ký tự số"
                },
                "txt_quantity": {
                    required: "Hãy nhập số lượng sản phẩm",
                    minlength: "Hãy nhập ít nhất 1 ký tự số",
                    maxlength: "Hãy nhập ít hơn 8 ký tự số"
                },
                "txt_image": {
                    required: "Hãy chọn ảnh cho sản phẩm",
                    accept:"Bạn cần chọn file ảnh"
                }
            }
        });
    });
</script>

@endsection