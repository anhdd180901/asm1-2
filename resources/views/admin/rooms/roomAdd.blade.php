@extends('admin.layouts.main')
@section('content')
<form action="{{ route('room.postAdd') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Tên</label>
      <input type="text" class="form-control" name="room_no">
    </div>
    <div class="form-group">
        <label for="">Dịch vụ</label>
        <select class="form-control" name="service_id[]" multiple>
          @foreach ($service as $s)
              <option value="{{$s->id}}">{{$s->name}}</option>
          @endforeach
        </select>
      </div>
    <div class="form-group">
        <label for="">Số tầng</label>
        <input type="text" class="form-control" name="floor">
      </div>
      <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" name="price">
      </div>
      <div class="form-group">
        <label for="">Mô tả</label>
        <input type="text" class="form-control" name="detail">
      </div>

    <button type="submit"class="btn btn-primary" >theem</button>
</form>
@endsection
