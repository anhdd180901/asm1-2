@extends('admin.layouts.main')
@section('content')
<form action="{{ route('service.postEdit', ['id' =>$detail->id]) }}" method="post" enctype="multipart/form-data">
    {{-- file bat buoc phai co  enctype="multipart/form-data" --}}
    @csrf
    {{-- form la phai co @csrf --}}
    <div class="form-group">
      <label for="">name</label>
      <input type="text"class="form-control" name="name" value="{{$detail->name}}">
    </div>
    <div class="form-group">
        <label for="">icon</label>
        <input type="file"class="form-control" name="icon" value="{{$detail->icon}}">
      </div>
    <button type="submit" class="btn btn-success">Them Moi</button>
</form>
@endsection
