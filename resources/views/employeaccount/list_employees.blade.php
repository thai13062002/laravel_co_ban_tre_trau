@extends('employeaccount.layout.nav')
@section('body')
    <h1>Danh sách nhân viên dưới bạn</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">user_id</th>
            <th scope="col">department_id</th>
            <th scope="col">position</th>
            <th scope="col">address</th>
            <th scope="col">sex</th>
            <th scope="col">birthday</th>

          </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employe  )
         <tr>
            <th scope="row">{{$employe->id}}</th>
            <td>{{$employe->name}}</td>
            <td>{{$employe->user_id}}</td>
            <td>{{$employe->department_id}}</td>
            <td>{{$employe->position}}</td>
            <td>{{$employe->address}}</td>
            <td>{{$employe->sex}}</td>
            <td>{{$employe->birthday}}</td>

          </tr>
        @endforeach
        </tbody>
      </table>
@endsection
