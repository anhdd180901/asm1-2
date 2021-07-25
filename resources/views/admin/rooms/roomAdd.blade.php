@extends('admin.layouts.main')
@section('content')
<form action="{{ route('room.postAdd') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="">Ten</label>
      <input type="text" class="form-control" name="room_no">
    </div>
    <div class="form-group">
      <label for="">dich vu</label>
      <select class="form-control" name="service_id[]" multiple>
        @foreach ($service as $s)
            <option value="{{$s->id}}">{{$s->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit"class="btn btn-primary" btn-lg btn-block">theem</button>
</form>
@endsection
