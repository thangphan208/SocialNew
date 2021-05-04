<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .cover-sec img {
            width: 100%;
            height: 300px;
        }

        .file-change {
            background: #fff;
            border: 2px solid #e44d3a;
            border-radius: 3px;
            color: #e44d3a;
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-weight: 600;
            outline: none;
            padding: 12px 20px;
            position: relative;
            transition: all 0.3s;
            vertical-align: middle;
            margin: 0;
            float: right;
            text-transform: uppercase;
            z-index: 1;
            top: -61px;
        }

        .user__profile {
            position: relative;
            z-index: 1;
            text-align: center;
            top: -143px;
        }

        .user-pro-img {}

        .user-pro-img img {
            border: solid 1px rgba(101, 191, 233, 0.733);
            width: 200px;
            border-radius: 50%;
            margin: 0 auto;
        }

        .number-follow {
            left: 42.5%;
            position: relative;

        }

        .number-follow td {
            font-weight: bold;
        }

        .item-fl {
            padding: 0 5px;
        }

        .profile__main {
            position: relative;
            top: -130px;
        }

        .list-group-item {
            border: none;
        }

        .card {
            margin: 15px;
        }

        .lang-menu {
            width: 100px;
            text-align: right;
            font-weight: bold;
            margin-top: 25px;
            position: relative;
        }

        .lang-menu .selected-lang {
            display: flex;
            justify-content: space-between;
            line-height: 2;
            cursor: pointer;
        }

        .lang-menu .selected-lang:before {
            content: '';
            display: inline-block;
            width: 32px;
            height: 32px;
            background-image: url(https://www.countryflags.io/us/flat/32.png);
            background-size: contain;
            background-repeat: no-repeat;
        }

        .lang-menu ul {
            margin: 0;
            padding: 0;
            display: none;
            background-color: #fff;
            border: 1px solid #f8f8f8;
            position: absolute;
            top: 45px;
            right: 0px;
            width: 125px;
            border-radius: 5px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
        }


        .lang-menu ul li {
            list-style: none;
            text-align: left;
            display: flex;
            justify-content: space-between;
        }

        .lang-menu ul li a {
            text-decoration: none;
            width: 125px;
            padding: 5px 10px;
            display: block;
        }

        .lang-menu ul li:hover {
            background-color: #f2f2f2;
        }

        .lang-menu ul li a:before {
            content: '';
            display: inline-block;
            width: 25px;
            height: 25px;
            vertical-align: middle;
            margin-right: 10px;
            background-size: contain;
            background-repeat: no-repeat;
        }



        .en:before {
            background-image: url(https://www.countryflags.io/us/flat/32.png);
        }


        .vn:before {
            background-image: url(https://www.countryflags.io/vn/flat/32.png);
        }


        .lang-menu:hover ul {
            display: block;
        }

    </style>
</head>

<body>
    @include('header')
    <div class="container">
        <section class="cover-sec">
            <img src="https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?size=626&ext=jpg"
                alt="">
            <div class="add-pic-box">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-12 col-sm-12">
                            <label for="file" class="file-change">Change Image</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="user__profile">
            <div class="user-pro-img">
                <img src="\img\avt\{{ $user->avatar }}" alt="">
                <div class="add-dp" id="OpenImgUpload">
                    <label for="file"><i class="fas fa-camera"></i></label>
                </div>
                <div>{{ $user->name }}</div>
                <div class="number-follow">
                    <table>
                        <tr>
                            <td class="item-fl">Followers</td>
                            <td class="item-fl">Followes</td>
                        </tr>
                        <tr>
                            <td class="item-fl">{{ $numFollowers }}</td>
                            <td class="item-fl">{{ $numFollowees }}</td>
                        </tr>
                    </table>
                </div>
                @if ($user->id == Auth::user()->id)
                @else
                    @if (!$check)
                        <a href="{{ route('updateFollow', ['id' => $user->id]) }}">
                            <button>Follow</button>
                        </a>
                    @else
                        <a href="{{ route('unFollow', ['id' => $user->id]) }}">
                            <button>Un-Follow</button>
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <div class="profile__main">
            <div class="row">
                <div class="col">
                    <ul class="list-group mt-5">
                        <li class="list-group-item" style="font-weight: bold">Information</li>
                        <li class="list-group-item">Email : {{ $user->email }}</li>
                        <li class="list-group-item">Date of birth :27/09/2000</li>
                        <li class="list-group-item">Gender : male</li>
                        <li class="list-group-item">Address : Ha noi -Viet Nam</li>
                    </ul>
                </div>
                <div class="col-8 mt-5">
                    <div class="list__post">
                        @foreach ($posts as $post)
                            <div class="card">
                                <h2>This is id : {{ $post->id }}</h2>
                                <h5>{{ $post->created_at }}</h5>
                                <div class="fakeimg" style="height:200px;">
                                    <img src="{{ $post->image }}" style="height:200px;" alt="">
                                </div>
                                <p>Some text..</p>
                                <p>{{ $post->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
