@extends('./back_end/layout')
@section('header_name',"Category")
@section('header_name',"Category")
@section('content')
<table class="table table-striped" style="background-color: white;text-align: center">
    <thead>
        <tr>
            <th scope="col">id_danhmuc</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col"><a id="" class="btn btn-success" href="{{route('back-add-category')}}" role="button">Thêm Danh Mục</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td scope="row">{{$val->id}}</td>
            <td>{{$val->name}}</td>
            <td>
                <a class="btn btn-sm btn-dark" href="{{route('back-edit-category',$val->id)}}">Sửa</a>
                <a class="btn btn-sm btn-danger btn-remove" href="{{route('back-delete-category',$val->id)}}">Xóa</a>
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