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

        </style>
</head>
<body>
    @include('header')
    <div class="container">
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <div class="user__infor mt-3">
                        <a href="/user/detail" style="display: flex; text-decoration: none">
                            <div class="user__infor-Image">
                                <img src="{{$user_get->avatar}}"
                                    alt="" style="margin: 5px">
                            </div>
                            <div class="user__infor-Name">
                                 {{$user_get->name}}
                            </div>
                        </a>

                    </div>
                    <ul class="list-group mt-5">
                        <li class="list-group-item"><a href="/user/following">Following</a></li>
                        <li class="list-group-item"><a href="/user/home">All post</a></li>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="post">
                        <p>New post</p>
                        <div id="postboxpos" class="post">
                            <textarea placeholder="What's in your mind" id="postbox">
                        </textarea>
                        </div>
                        <div id="postpos" class="post">
                            <input type="submit" id="buttonpost" value="post" />
                        </div>
                        <div class="list__post">
                            @foreach ($posts as $post)
                                <div class="card">
                                    <h2>This is id : {{ $post->id }}</h2>
                                    <h5>{{ $post->created_at }}</h5>
                                    <div class="fakeimg" style="height:200px;">
                                        <img src="{{ $post->image }}" style="height:200px;" alt="">
                                    </div>
                                    <p>Some text..</p>
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
