@extends('rootaccount.layout.nav')

@section('title', 'Phòng ban')
@section('body')
    <h1>Quản lý nhân viên</h1>
    <button type="button" class="btn btn-success"><a class="nav-link" href="{{route('employees.create')}}">Thêm</a></button>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Tên</th>
            <th scope="col">User_id</th>
            <th scope="col">Department_id </th>
            <th scope="col">Position  </th>
            <th scope="col">Quê quán  </th>

            <th scope="col">Giới tính  </th>
            <th scope="col">Ngày sinh  </th>

            <th scope="col">Sửa  </th>
            <th scope="col">Xoá  </th>

          </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employe )
         <tr>
            <th scope="row">{{$employe->id}}</th>
            <th scope="row">{{$employe->name}}</th>

            <th scope="row">{{$employe->user_id }}</th>
            <th scope="row">{{$employe->department_id }}</th>
            <th scope="row">{{$employe->position  }}</th>

            <th scope="row">{{$employe->address }}</th>
            <th scope="row">{{$employe->sex}}</th>
            <th scope="row">{{$employe->birthday  }}</th>

            <td><a class="nav-link"  href="{{route('employees.edit',['employee'=>$employe->id])}}">Sửa</a></td>
            <td> <form action="{{ route('employees.destroy', $employe->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Xoá</button>
            </form></td>
          </tr>
        @endforeach
        </tbody>
      </table>
@endsection
