@extends('admin.layouts.main')
@section('content')
<form action="{{ route('room.postEdit', ['id'=>$rooms->id ]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Tên</label>
      <input type="text" class="form-control" name="room_no" value="{{$rooms->room_no}}">
    </div>
    <div class="form-group">
      <label for="">Dịch vụ</label>
      <select class="form-control" name="service_id[]" multiple>
        @foreach ($service as $s)
            <option value="{{$s->id}}" {{$rooms->services->contains('id',$s->id) ? 'selected' : "" }}  >{{$s->name}}</option>
            {{--                                //thay cho việc vòng lặp để so sánh 2 mảng --}}
              {{--
service         id         1 2 3 4
                $s->id == $detail->service_id ? 'selected' : "";
                1       == 1   selected
                2       == 2   selected
room_service    service_id 1 2 3
                --}}
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="">Tầng</label>
        <input type="text" class="form-control" name="room_no" value="{{$rooms->floor}}">
      </div>
      <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" name="image" value="{{$rooms->image}}">
      </div>
      <div class="form-group">
        <label for="">Mô tả</label>
        <input type="text" class="form-control" name="detail" value="{{$rooms->detail}}">
      </div>
      <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" name="price" value="{{$rooms->price}}">
      </div>
    <button type="submit"class="btn btn-primary" >sua</button>
</form>
@endsection
