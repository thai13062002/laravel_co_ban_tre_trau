@extends('rootaccount.layout.nav')
@section('title','Thêm account')
@section('body')
<h1>Thêm users</h1>
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Role</label>
                    <select name="role_id" class="form-select" aria-label="Default select example">
                        <option value="1">Root account</option>
                        <option value="2">Employe account</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
@endsection
