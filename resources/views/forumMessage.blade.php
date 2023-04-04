<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>論壇發表</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/forumMessage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/NavFooter.css') }}">
</head>

<body>
    <div id="container">
        <nav id="navbar">
            <div class="logo"><a href="index.html"><img src="./img/logo.jpg"></a></div>
            <ul class="menu">
                <li><a href="index.html">拼車</a></li>
                <li><a href="all-memo.html">論壇</a></li>
                <li><a href="map.html">心得</a></li>
                <li><a href="what-to-eat.html"><img src="./pic/admin.png" alt=""></a></li>
            </ul>
        </nav>

        <!-- navbar for mobile -->
        <nav id="mobileNavbar">
            <div class="mobileLogo"><a href="index.html"><img src="./img/logo.jpg"></a></div>
            <label id="hamburgerIcon" for="hamburgerInput">
                <i class="bi bi-list"></i>
            </label>
            <input type="checkbox" id="hamburgerInput">
            <ul class="menuForMobile">
                <li><a href="index.html">拼車</a></li>
                <li><a href="all-memo.html">論壇</a></li>
                <li><a href="map.html">心得</a></li>
                <li><a href="what-to-eat.html">個人頁面</a></li>
            </ul>
        </nav>
        <div id="content-container">
            <br>
            <h1>論壇發表</h1>
            <div id="FormContainer">
                <form method="post" action="/BigProject/public/forumMes/1" enctype="multipart/form-data">
                @csrf
                    選擇封面：<br>
                    <p></p>
                    <!-- <label for="photo-upload">
                        <img src="./pic/addpic.png" alt="">
                    </label> -->
                    <input type="file" id="photo-upload" name="pic" accept="image/*">
                    <hr>
                    選看板：
                    <input type="radio" name="sid" id="" value="1">問題
                    <input type="radio" name="sid" id="" value="2">揪團
                    <input type="radio" name="sid" id="" value="3">黑特
                    <hr>
                    <input type="text" placeholder="輸入標題" name = "title">
                    <br>
                    <textarea placeholder="輸入內容" name = "content"></textarea>
                    <br><br>
                    <hr>
                    <div id="bt">
                        <input type="submit" value="發布">
                        <span>&emsp;&emsp;</span>
                        <button>儲存</button>
                    </div>
                </form>
            </div>
            <br><br>
        </div>

        <footer id="footer">
            <div id="left">Copyright © 2023 the-sponger.com Rights Reserved.</div>
            <div id="links">
                <a href="https://the-sponger.com/"><i class="bi bi-house"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="https://www.instagram.com/the.sponger/"><i class="bi bi-instagram"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="mailto:thesponger91@gmail.com"><i class="bi bi-envelope"></i></a>
            </div>
        </footer>

</body>

</html>