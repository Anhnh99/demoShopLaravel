@extends('./back_end/layout')
@section('header_name',"Order")
@section('header_name',"Order")
@section('content')
<table class="table table-striped" style="background-color: white;text-align: center">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Người Nhận</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày Mua</th>
            <th scope="col">Chi Tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $val)
        <tr>
            <td scope="row">{{$val->id}}</td>
            <td>
                @php
                    $parent=$val->getNameUser();
                @endphp
                @if($parent !== false)
                    <?= $parent->fullname; ?>
                @endif
            </td>
            <td>{{$val->address}}</td>
            <td>{{$val->date}}</td>
            <td>
                <a class="btn btn-sm btn-success" href="{{route('back-order-detail',$val->id)}}">Chi Tiết</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection