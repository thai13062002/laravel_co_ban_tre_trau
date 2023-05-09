@extends('employeaccount.layout.nav')
@section('body')
<h1> Thông tin cá nhân</h1>
@if (!$information)
<div class="col-md-12">
    Không có thông tin
    </div>
@else
<div class="col-md-12">
    Họ và tên: {{$information->name}}
    </div>
    <div class="col-md-12">
        Chức vụ: {{$information->position}}
        </div>
    <div class="col-md-12">
        Địa chỉ: {{$information->address}}
    </div>
    <div class="col-md-12">
        Giới tính: {{$information->sex}}
    </div>
    <div class="col-md-12">
        Ngày sinh: {{$information->birthday}}
    </div>
<button ><a class="nav-link" href="{{route('employe.editinformation')}}">Sửa</a></button>
@endif

@endsection
