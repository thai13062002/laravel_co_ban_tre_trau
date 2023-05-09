@extends('rootaccount.layout.nav')

@section('title', 'Phòng ban')
@section('body')
    <h1>Quản lý phòng ban</h1>
    <button type="button" class="btn btn-success"><a class="nav-link" href="{{route('departments.create')}}">Thêm</a></button>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>

          </tr>
        </thead>
        <tbody>
        @foreach ($departments as $department )
         <tr>
            <th scope="row">{{$department->id}}</th>
            <td>{{$department->name}}</td>
            <td><a class="nav-link"  href="{{route('departments.edit',['department'=>$department->id])}}">Sửa</a></td>
            <td> <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Xoá</button>
            </form></td>
          </tr>
        @endforeach


        </tbody>
      </table>
@endsection
