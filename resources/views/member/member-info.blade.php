<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人頁面</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/NavFooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/member-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/member.css')}}">
    <script type="text/javascript" src="{{asset('js/member-all.js')}}"></script>
</head>

<body>
    <div id="container">
        <nav id="navbar">
            <div class="logo"><a href="/BigProject/public/"><img src="{{asset('img/logo.jpg')}}"></a></div>
            <ul class="menu">
                <li><a href="/BigProject/public/carpool">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                <li><a href="/BigProject/public/member/info">頭像</a></li>
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
                <li><a href="/BigProject/public/carpool">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                <li><a href="/BigProject/public/member/info">頭像</a></li>
            </ul>
        </nav>

        <div id="content-container">
            <div id="pageHeader">
                <h1>個人資料</h1>
            </div>

            <div id="mainContent">
                <div id="leftBar">
                    <ul>
                        <li class="current"><a href="info">個人資料</a></li>
                        <li><a href="carpool">拼車/揪團紀錄</a></li>
                        <li><a href="forum">論壇</a></li>
                        <li><a href="feel">心得</a></li>
                        <li><a href="save">收藏</a></li>
                    </ul>
                </div>
                <div id="mobileLeftBar">
                    <ul>
                        <li class="current"><a href="info">個人資料</a></li>
                        <li><a href="carpool">拼車/揪團紀錄</a></li>
                        <li><a href="forum">論壇</a></li>
                        <li><a href="feel">心得</a></li>
                        <li><a href="save">收藏</a></li>
                    </ul>
                </div>
                
                <div class="mainContent">
                    <form id="info">
                        <h2>個人資料</h2>
                        <p id="icon">
                            <span id="iconName">頭像：</span>
                            <img src="{{asset('img/1.jpeg')}}" id="iconImg">
                            <input type="file" name="icon"><br />
                        </p>
                        <p>
                            暱稱：
                            <input type="text" name="userName" value="王小明"><br />
                        </p>
                        <p>
                            生日：
                            <input type="date" name="birthday" value="2019-10-10"><br />
                        </p>
                        <p>
                            性別：
                            <label for="male"><input type="radio" name="gender" id="male" value="male" checked>男</label>
                            <label for="female"><input type="radio" name="gender" id="female" value="female">女</label>
                            <label for="other"><input type="radio" name="gender" id="other"
                                    value="other">其他</label><br />
                        </p>
                        <p>
                            電子郵件：
                            abc123@gmail.com<br />
                        </p>
                        <p>
                            關於我：<br />
                            <textarea name="" id="" cols="30" rows="10">早安</textarea><br />
                        </p>
                        <button type="button">儲存修改</button>
                    </form>
<hr />
                    <form id="changePwd">
                        <h2>修改密碼</h2>
                        <p>
                            目前密碼：
                            <input type="password" name="currentPwd"><br />
                        </p>
                        <p>
                            新密碼：
                            <input type="password" name="newPwd"><br />
                        </p>
                        <p>
                            確認密碼：
                            <input type="password" name="confirmPwd"><br />
                        </p>
                        <button type="button">儲存修改</button>
                    </form>
                </div>

            </div>
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
