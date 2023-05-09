<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{route ('rootHome')}}">Trang chủ</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route ('users.index')}}">Quản lý tài khoản</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('departments.index')}}">Quản lý phòng ban</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index')}}">Quản lý nhân viên</a>
                      </li>

                    </ul>

                    <span class="navbar-text me-3">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (auth()->check())
                                        Hi, {{ auth()->user()->name }}
                                    @endif
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('root.information')}}">Thông tin</a></li>
                                  <li><a class="dropdown-item" href="{{route('user.changePassword')}}">Đổi mật khẩu</a></li>
                                </ul>
                              </li>
                        </ul>
                    </span>
                    <span class="navbar-text">
                        <form action="{{route ('logOut')}}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </span>
                  </div>
                </div>
              </nav>
        </div>
        @yield('body')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
</body>
</html>
