<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        .bg-maroon {
            background-color: maroon;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-maroon">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/unsika.png')}}" alt="" width="30" height="30" class="d-inline-block align-text-top">
                Sistem Informasi Akademik UNSIKA
            </a>
            <ul class="navbar-nav">
                <li class="nav-item @yield('menu')">
                    <a class="nav-link" href="/dashboards">Dashboard</a>
                </li>
                <li class="nav-item @yield('menu1')">
                    <a class="nav-link" href="/dosens">Dosen</a>
                </li>
                <li class="nav-item @yield('menu2')">
                    <a class="nav-link" href="/mahasiswas">Mahasiswa</a>
                </li>
                <li class="nav-item @yield('menu3')">
                    <a class="nav-link" href="/matakuliahs">Mata Kuliah</a>
                </li>
            </ul>    
        </div>
    </nav>
    @yield('content')
</body>
</html>