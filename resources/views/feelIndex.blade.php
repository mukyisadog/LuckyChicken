<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>心得首頁</title>
    <link rel="stylesheet" href="./css/NavFooter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/ftest.css">
    <link rel="stylesheet" href="./css/feelIndex.css">
</head>
<style>
</style>
<body>

    <div id="container">
        <nav id="navbar">
            <div class="logo"><a href="/BigProject/public/"><img src="./img/logo.jpg"></a></div>
            <ul class="menu">
                <li><a href="#">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                <li><a href="#"><img src="public/pic/addpic.png" alt=""></a></li>
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
            <div class="row">
                <div class="column1">
                    <div class="abcc"></div>
                    <h1>心得</h1>
                    <div>
                        <form class="example" action="">
                            <input type="text" placeholder="輸入關鍵字" name="search">
                            <button type="submit">搜索</button>
                        </form>
                        <br>
                        <div id="articles">
                        @foreach($datas as $data)
                            <div class="article">
                                <div class="articlePic">
                                    <img src="data:image/jpeg;base64,{{base64_encode($data->pic)}}" >
                                </div>
                                <div class="articleCon">
                                    <a href="/BigProject/public/feelDetail/{{$data->id}}">
                                        <h4>{{$data->title}}</h4>
                                    </a>
                                    <h5>作者：{{$data->uname}}</h5>
                                    <h5>發布日期：{{$data->publishD}}</h5>
                                </div>
                            </div>
                        @endforeach
                        </div>                       
                    </div>
                </div>
                <aside class="column2">
                    <h1>-最新文章-</h1>
                    @foreach($datas as $data)
                        <div class="article2">
                            <div class="article2Con">
                                <a href="/BigProject/public/feelDetail/{{$data->id}}">
                                    <h4>{{$data->title}}</h4>
                                </a>
                                <p>作者：{{$data->uname}}</p>
                            </div>
                        </div>
                    @endforeach
                </aside>
            </div>
        </div>
        <div class="abc"></div>
        <footer id="footer">
            <div id="left">Copyright © 2023 the-sponger.com Rights Reserved.</div>
            <div id="links">
                <a href="https://the-sponger.com/"><i class="bi bi-house"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="https://www.instagram.com/the.sponger/"><i class="bi bi-instagram"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="mailto:thesponger91@gmail.com"><i class="bi bi-envelope"></i></a>
            </div>
        </footer>

        <!-- 這邊先寫死記得改 -->
        <button id="btPublish" onclick="window.location.href='/BigProject/public/feelMessage/1'">
            發文
        </button>
</body>

</html>