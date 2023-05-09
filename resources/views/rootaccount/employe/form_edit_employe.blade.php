@extends('rootaccount.layout.nav')
@section('title','Sửa nhân viên')
@section('body')
<h1>Sửa nhân viên</h1>
            <form action="{{route('employees.update',['employee'=>$employe->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Tên nhân viên</label>
                  <input value="{{$employe->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User_id</label>
                    <input readonly value="{{$employe->user_id }}" name="user_id"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Department_id</label>
                    <select name="department_id" class="form-select"  id="">
                        @foreach ($departments as $department )
                            <option value="{{$department->id}}">{{$department->id}}</option>
                         @endforeach
                    </select>
                </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Chức vụ</label>
                    <select name="position" class="form-select" id="">
                            <option value="manager">Trưởng phòng</option>
                            <option value="employe">Nhân viên</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quê quán</label>
                    <input value="{{$employe->address}}" name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                    <select name="sex" class="form-select" id="">
                        <option value="men">Nam</option>
                        <option value="female ">Nữ</option>
                </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ngày sinh</label>
                    <input value="{{$employe->birthday}}" name="birthday" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
@endsection
