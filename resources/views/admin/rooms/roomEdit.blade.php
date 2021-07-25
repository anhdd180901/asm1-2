@extends('admin.layouts.main')
@section('content')
<form action="" method="post">
    @csrf
    <div class="form-group">
      <label for="">Ten</label>
      <input type="text" class="form-control" name="room_no">
    </div>
    <div class="form-group">
      <label for="">dich vu</label>
      <select class="form-control" name="service_id[]" multiple>
        @foreach ($service as $s)
            <option value="{{$s->id}}" {{$rooms->contains('id',$s->id) ? 'selected' : "" }}  >{{$s->name}}</option>
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
    <button type="submit"class="btn btn-primary" btn-lg btn-block">sua</button>
</form>
@endsection
