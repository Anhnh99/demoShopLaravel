@extends('./back_end/layout')
@section('header_name',"Category")
@section('header_name',"Category")
@section('content')
<table class="table table-striped" style="background-color: white;text-align: center">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách</th>
            <th scope="col">Sản Phẩm</th>
            <th scope="col">Nội Dung</th>
            <th scope="col">Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td scope="row">{{$val->id}}</td>
            <td>
                @php
                $parent = $val->getNameUser();
                @endphp
                @if($parent !== false)
                <?= $parent->fullname ?>
                @endif
            </td>
            <td>
                @php
                $parent = $val->getNamePro();
                @endphp
                @if($parent !== false)
                <?= $parent->name ?>
                @endif
            </td>

            <td>{{$val->content}}</td>
            <td>
                <a class="btn btn-sm btn-danger btn-remove" href="{{route('back-delete-comment',$val->id)}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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
</script>
@endsection