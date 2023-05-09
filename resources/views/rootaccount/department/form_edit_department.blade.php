@extends('rootaccount.layout.nav')
@section('title', 'Sửa phòng ban')
@section('body')
    <h1>Sửa phòng ban</h1>
    <form action="{{ route('departments.update', ['department' => $department->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên phòng ban</label>
            <input value="{{ $department->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
