@extends('admin.layouts.main')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên phòng</th>
        <th>dich vu cua phong</th>
        {{-- <th scope="col">Số tầng</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Giá</th> --}}
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $rooms as $room )
        <tr>
            <th>{{$room->id}}</th>
            <td>{{$room->room_no}}</td>
            <td>
                @foreach ($room->services as $nameSv)
                <span>{{$nameSv->name}}</span><br>
                @endforeach
            </td>
            {{-- <td>{{$room->floor}}</td>
            <td><img src="/upload/rooms/{{$room->image}}" width="100px" alt=""></td>
            <td><textarea name="" id="" cols="30"> {{$room->detail}} </textarea></td>
            <td>{{$room->price}}</td> --}}
            <td>
            <a name="" id="" class="btn btn-primary" href="{{ route('room.getEdit', ['id'=>$room->id ]) }}" role="button">Edit</a>
            </td>
            <td>
            <a name="" id="" class="btn btn-danger" href="{{ route('room.getDelete', ['id'=>$room->id ]) }}" role="button">Delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>
  </table>
  <a name="" id="" class="btn btn-primary" href="{{ route('room.getAdd') }}" role="button">theem</a>
@endsection
