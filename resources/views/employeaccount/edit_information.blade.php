@extends('employeaccount.layout.nav')
@section('body')
<h1>Sửa Thông tin cá nhân</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Tên nhân viên</label>
                  <input readonly value="{{$information->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quê quán</label>
                    <input value="{{$information->address}}" name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                    <input value="{{$information->birthday}}" name="birthday" type="date" class="form-control">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
@endsection
