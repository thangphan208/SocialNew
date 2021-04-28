<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
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
    <div class="container">
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <div class="user__infor mt-3">
                        <div class="user__infor-Image">
                            <img src="https://i.pinimg.com/originals/b4/00/85/b400851a6b07f8877a9236f275bd8d4f.jpg"
                                alt="">
                        </div>
                        <div class="user__infor-Name">
                            <p>Phan Quang Thang</p>
                        </div>
                    </div>

                    <ul class="list-group mt-5">
                        <li class="list-group-item">Explose</li>
                        <li class="list-group-item">All articles</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
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
                            @foreach ($listpost as $listpost)
                            <div class="card">
                                <h2>{{ $listpost->id }}</h2>
                                <h5>Title description, Sep 2, 2017</h5>
                                <div class="fakeimg" style="height:200px;">Image</div>
                                <p>Some text..</p>
                                <p>{{ $listpost->description }}</p>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="col">

                </div>
            </div>

        </div>

        <footer>

        </footer>
    </div>
</body>

</html>
