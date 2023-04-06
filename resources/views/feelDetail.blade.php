<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>心得文章內容</title>
    <link rel="stylesheet" href="{{ asset('css/feelDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/NavFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <div id="container">
        <nav id="navbar">
            <div class="logo"><a href="/BigProject/public/"><img src="./img/logo.jpg"></a></div>
            <ul class="menu">
                <li><a href="#">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                <li><a href="#"><img src="./pic/admin.png" alt=""></a></li>
            </ul>
        </nav>

        <!-- navbar for mobile -->
        <nav id="mobileNavbar">
            <div class="mobileLogo"><a href="/BigProject/public/"><img src="./img/logo.jpg"></a></div>
            <label id="hamburgerIcon" for="hamburgerInput">
                <i class="bi bi-list"></i>
            </label>
            <input type="checkbox" id="hamburgerInput">
            <ul class="menuForMobile">
                <li><a href="#">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                <li><a href="#">個人頁面</a></li>
            </ul>
        </nav>
        <div id="content-container">
            <div class="abc"></div>
            <div class="row">
                <div class="column1">
                    <!-- 文章內容 -->
                    <div id="content">
                    @foreach($article as $article1)
                        <div>
                            <img src="data:image/jpeg;base64,{{base64_encode( $article1->upicture)}}" >
                            <div>{{$article1->username}}</div>
                            <i class="bi bi-suit-heart-fill"></i>
                        </div>
                        <div>
                            <h1>標題：{{ $article1->title}}</h1>
                            <p>時間:{{ $article1->createtime}}</p>
                        </div>
                        <div id="imgDiv">
                        <img src="data:image/jpeg;base64,{{base64_encode( $article1->fpicture)}}" >
                        </div>
                        <div id="artCon">
                            {{$article1->content}}
                        </div>
                    @endforeach
                    </div>
                    <!-- 留言紀錄 -->

                    <div id="mesHis">
                    @foreach($comments as $comment)
                        <div class="headDiv">
                        
                            <div class="headDivChi">
                                <img class="headDivPic" src="data:image/jpeg;base64,{{base64_encode( $comment->upicture)}}" >
                                <p>{{$comment->username}}</p>
                            </div>
                            <div class="headDivChi2">
                                <div>{{$comment->content}}</div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                    <!-- 留言 -->
                    <div id="mes">
                        <!-- 這邊先寫死 後面記得改/BigProject/public/feelCom/1/1 因為不知道登入者是誰 -->
                        <form method="post" action="/BigProject/public/feelCom/1/1">
                            @csrf
                            <div class="formPic">
                                <img src="./pic/admin.png" alt="頭像">
                                <p>阿里 ></p>
                            </div>
                                <textarea name="feelcom" id="" cols="30" rows="10" placeholder="留言...."></textarea>
                                <input type="submit" value="-送出-">
                        </form>
                    </div>
                </div>
                <div class="column2">
                    <aside>
                        <h1>-最新文章-</h1>
                        @foreach($datas as $data)
                            <div class="article2">
                                <div class="article2Con">
                                    <a href="/BigProject/public/feelDetail/{{$data->fid}}">
                                        <h4>{{$data->title}}</h4>
                                    </a>
                                    <p>作者：{{$data->username}}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
        <div class="abcc"></div>
        <footer id="footer">
            <div id="left">Copyright © 2023 the-sponger.com Rights Reserved.</div>
            <div id="links">
                <a href="https://the-sponger.com/"><i class="bi bi-house"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="https://www.instagram.com/the.sponger/"><i class="bi bi-instagram"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="mailto:thesponger91@gmail.com"><i class="bi bi-envelope"></i></a>
            </div>
        </footer>
    </div>


    
</body>

</html>