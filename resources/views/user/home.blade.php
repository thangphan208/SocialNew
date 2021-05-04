<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>{{ __('language.home_page_title') }}</title>
    <style>
        * {
            margin: 0px;
        }

        .row {
            margin: 0px;
        }

        .user__infor {
            box-sizing: border-box;
            display: flex;
            text-align: center;

        }

        .user__infor-Image img {
            width: 50px;
        }

        .user__infor-Name p {
            display: inline;
            justify-content: center;
            margin-left: 10px;
        }

        .post {
            background-color: aquamarine;
        }

        #postboxpos textarea {
            width: 500px;
            margin: 0 auto;
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
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <div class="user__infor mt-3">
                        <a href="{{ route('showUserDetail', ['id' => $user->id]) }}"
                            style="display: flex; text-decoration: none">
                            <div class="user__infor-Image">
                                <img src="\img\avt\{{ $user->avatar }}" alt="" style="margin: 5px">
                            </div>
                            <div class="user__infor-Name">
                                {{ $user->name }}
                            </div>
                        </a>
                    </div>
                    <ul class="list-group mt-5">
                        <li class="list-group-item"><a
                                href="{{ route('followingPage') }}">{{ __('language.Following') }}</a></li>
                        <li class="list-group-item"><a
                                href="{{ route('homePage') }}">{{ __('language.All post') }}</a></li>
                    </ul>
                    <h3>List user</h3>
                    <ul class="list-group mt-5">
                        @foreach ($users as $user)
                            <li class="list-group-item"><a href="{{ route('showUserDetail', ['id' => $user->id]) }}"
                                    style="display: flex; text-decoration: none">
                                    <div class="user__infor-Image">
                                        <img src="{{ $user->avatar }}" alt="" style="margin: 5px">
                                    </div>
                                    <div class="user__infor-Name">
                                        {{ $user->name }}
                                    </div>
                                </a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6">
                    <div class="post">
                        <p>{{ __('language.New post') }}</p>
                        <form action="{{ route('user.post.new') }}" method="post" enctype="multipart/form-data">
                            <div id="postboxpos" class="post">
                                <textarea name="description" placeholder="What's in your mind" id="postbox">
                                </textarea>
                            </div>
                            <div id="postpos" class="post">
                                <input type="file" name="file" />
                            </div>
                            <div id="postpos" class="post">
                                <input type="submit" id="buttonpost" value="{{ __('language.post') }}" />
                            </div>
                        </form>
                        <div class="list__post">
                            @foreach ($posts as $post)
                                <div class="card">
                                    <h2>{{ $post->id }}</h2>
                                    <h5>{{ $post->created_at }}</h5>
                                    <div class="fakeimg" style="height:200px;">
                                        <img src="{{ $post->image }}" style="height:200px;" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
