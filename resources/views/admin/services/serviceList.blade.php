@extends('admin.layouts.main')
@section('content')
<a href="{{ route('service.getAdd') }}" class="btn btn-primary">Them moi</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên dịch vụ</th>
        <th scope="col">Icon</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $services as $service )
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$service->name}}</td>
            <td><img src="/upload/services/{{$service->icon}}" width="100px" alt=""></td>
            <td>
                <a href="{{ route('service.getEdit', ['id'=>$service->id]) }}" role="button" class="btn btn-primary">Update</a>
            </td>
            <td>
                <a href="{{ route('service.getDelete', ['id'=>$service->id]) }}" role="button" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
