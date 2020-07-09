@extends('./back_end/layout')
@section('header_name',"User")
@section('header_name',"user")
@section('content')
<table class="table table-striped" style="background-color: white;text-align: center">
    <thead>
        <tr>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Tài khoản</th>
            <!-- <th scope="col">Vai Trò</th> -->
            <th scope="col"><a id="" class="btn btn-success" href="{{route('back-add-user')}}" role="button">Thêm Tài Khoản</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
            <tr>
                <td scope="row">{{$val->fullname}}</td>
                <td>{{$val->account}}</td>
                <!-- <td>{{$val->role}}</td> -->
                <td>
                    <a class="btn btn-sm btn-dark" href="{{route('back-edit-user',$val->id)}}">Sửa</a>
                    <a class="btn btn-sm btn-danger btn-remove" href="{{route('back-delete-user',$val->id)}}">Xóa</a>
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