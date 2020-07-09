@extends('./back_end/layout')
@section('header_name',"Sản Phẩm")
@section('header_name',"Sản Phẩm")
@section('content')
<table class="table table-striped" style="background-color: white;text-align: center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Giá giảm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Số lượng</th>
            <th scope="col"><a id="" class="btn btn-success" href="{{route('back-add-product')}}" role="button">Thêm Sản Phẩm</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $val)
                <tr>
                    <td col="1">{{$val->id}}</td>
                    <!-- <td>{{$val->category_id}}</td> -->
                    <td>
                    @php
                        $parent = $val->getNameCate();
                    @endphp
                    @if($parent !== false)
                        <?= $parent->name; ?>
                    @endif
                    </td>
                    <td>{{$val->name}}</td>
                    <td>{{$val->price}}</td>
                    <td>{{$val->discount_price}}</td>
                    <td><img src="{{$val->image}}" style="width:100px;height:100px" alt=""></td>
                    <td>{{$val->quantity}}</td>
                    <td>
                        <!-- <a class="btn btn-sm btn-primary" href="">Chi Tiết</a> -->
                        <a class="btn btn-sm btn-dark" href="{{route('back-edit-product',$val->id)}}">Sửa</a>
                        <a class="btn btn-sm btn-danger btn-remove" href="{{route('back-delete-product',$val->id)}}">Xóa</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@stop
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
</script>
@endsection