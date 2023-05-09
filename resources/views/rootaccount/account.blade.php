@extends('rootaccount.layout.nav')

@section('title', 'Thêm account')
@section('body')
<div class="col-md-12">
    <h1>Quản lý tài khoản</h1>
</div>
<button type="button" class="btn btn-success"><a class="nav-link" href="{{route('users.create')}}">Thêm</a></button>
<form action="{{ route('root.reset') }}" method="POST" id="form-parent">
    @csrf

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Reset password</th>
            <th scope="col">id</th>
            <th scope="col">Role_id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user  )
         <tr>
            <td><input type="checkbox"  value="{{ $user->id }}" name="users[]"></td>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->role_id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a class="nav-link"  href="{{route('users.edit',['user'=>$user->id])}}">Sửa</a></td>
            <td> <a class="nav-link" href="{{route('users.destroy',['user'=>$user->id])}}">Xoá</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    <button type="submit" class="btn btn-primary">Reset mật khẩu</button>

</form>
@endsection

