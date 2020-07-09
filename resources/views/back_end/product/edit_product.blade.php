@extends('./back_end/layout')
@section('header_name',"Category")
@section('header_name',"Category")
@section('content')
<form id="myform" action="" method="post" enctype="multipart/form-data">
    @csrf
    <h3>Sửa sản phẩm</h3>
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
            <div class="form-group" hidden>
                <label>id<span class="text-danger"></span></label>
                <input type="text" class="form-control" name="txt_id" value="{{$data->id}}">
            </div>
            <div class="form-group">
                <label for="">Danh mục<span class="text-danger">*</span></label>
                <select name="txt_category" class="form-control">
                    @foreach($category as $cate)
                        <option 
                        @if($cate->id == $data->category_id)
                            selected
                        @endif
                         value="{{$cate->id}}">{{$cate->name}}
                        </option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label>Tên Sản Phẩm<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="txt_name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label>Giá<span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="txt_price" value="{{$data->price}}">
            </div>
            <div class="form-group">
                <label>Giá Giảm<span class="text-danger"></span></label>
                <input type="number" class="form-control" name="txt_discount" value="{{$data->discount_price}}">
            </div>
            <div class="form-group">
                <label>Số Lượng<span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="txt_quantity" value="{{$data->quantity}}">
            </div>
            <div class="form-group">
                <label>Mô Tả Sản Phẩm<span class="text-danger">*</span></label>
                <textarea name="txt_description" id="editor1" rows="10" cols="80">
                {{$data->description}}
                </textarea>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                <input type="file" onchange="encodeImageFileAsURL(this)" class="form-control" id="img" name="txt_image">
            </div>
            <div class="col-8 offset-2">
                <img id="preview-img" name="preview-img" style="width:300px;height:400px" src="{{asset($data->image)}}" class="img-fluid">
            </div>
        </div>

    </div>
    <div class="col-12 justify-content-end">
        <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
        <a name="" id="" class="btn btn-danger" href="{{route('back-product')}}" role="button">Hủy</a>
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
        if (file === undefined) {
            $('#preview-img').attr('src','');
            // $('#img').val()={{asset($data->image)}};
        } else {
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
                    maxlength: 8,

                },
                "txt_discount": {
                    required: true,
                    minlength: 1,
                    maxlength: 8,
                },
                "txt_quantity": {
                    required: true,
                    minlength: 1,
                    maxlength: 8,
                },
            },
            messages: {
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
                }
            }
        });
    });
</script>
@endsection