<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin/home">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">Logout</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Manager</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Email</th>
                <th scope="col">name</th>

              </tr>
            </thead>
            <tbody>

                @php
                    dd($listadmin);
                @endphp


                @foreach ($listadmin as $admin )
                <tr>
                    <th scope="row">{{$admin->email}}</th>
                    <td>Mark</td>
                    <td>Otto</td>

                  </tr>
                @endforeach


            </tbody>
          </table>
    </div>
</body>
</html>
