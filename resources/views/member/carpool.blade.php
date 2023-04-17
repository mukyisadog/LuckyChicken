<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>拼車/揪團紀錄</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/NavFooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/member-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/member-carpool.css')}}">
    <script src="{{asset('js/car-record.js')}}"></script>
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
            <div id="pageHeader">
                <h1>拼車/揪團紀錄</h1>
            </div>

            <div id="mainContent">
                <div id="leftBar">
                    <ul>
                        <li><a href="info">個人資料</a></li>
                        <li class="current"><a href="carpool">拼車/揪團紀錄</a></li>
                        <li><a href="forum">論壇</a></li>
                        <li><a href="feel">心得</a></li>
                        <li><a href="save">收藏</a></li>
                    </ul>
                </div>

                <div id="mobileLeftBar">
                    <ul>
                        <li><a href="info">個人資料</a></li>
                        <li class="current"><a href="carpool">拼車/揪團紀錄</a></li>
                        <li><a href="forum">論壇</a></li>
                        <li><a href="feel">心得</a></li>
                        <li><a href="save">收藏</a></li>
                    </ul>
                </div>

                <div class="mainContent">
                    <div id="inProgress">
                        <h2>開團中</h2>
                        <div class="accordion">
                            <div class="groupDate">
                                4/18
                            </div>
                            <div class="groupName">
                                北峰行
                            </div>
                            <div class="buttons">
                                <button name="" id="" class="operate">編輯</button>
                                <button name="" id="" class="operate">刪除</button>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="memberList">
                                <div class="memberPic">
                                    <img src="./pic/1.jpeg" class="memberIcon">
                                </div>
                                <div class="memberName">阿貓</div>
                                <div class="memberState">
                                    <button name="" id="" class="operate">已加入</button>
                                </div>
                            </div>
                        </div>

                        <div class="accordion">
                            <div class="groupDate">
                                3/30
                            </div>
                            <div class="groupName">
                                溪頭之旅
                            </div>
                            <div class="buttons">
                            <button name="" id="" class="operate">編輯</button>
                            <button name="" id="" class="operate">刪除</button>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="memberList">
                                <div class="memberPic">
                                    <img src="./pic/1.jpeg" class="memberIcon">
                                </div>
                                <div class="memberName">阿貓</div>
                                <div class="memberState">
                                    <button name="" id="" class="operate">已加入</button>
                                </div>
                            </div>
                            <div class="memberList">
                                <div class="memberPic">
                                    <img src="./pic/1.jpeg" class="memberIcon">
                                </div>
                                <div class="memberName">阿狗</div>
                                <div class="memberState">
                                    <button name="" id="" class="operate">已加入</button>
                                </div>
                            </div>
                            <div class="memberList">
                                <div class="memberPic">
                                    <img src="./pic/1.jpeg" class="memberIcon">
                                </div>
                                <div class="memberName">長頸鹿</div>
                                <div class="memberState">
                                    <button name="" id="" class="operate">✓</button>
                                    <button name="" id="" class="operate">✗</button>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="finished">
                        <h2>歷史紀錄</h2>
                        <div class="group">
                            <div class="groupDate">
                                3/15
                            </div>
                            <div class="groupName">
                                阿里山一日遊
                            </div>
                            <div class="joinMember">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                            </div>
                        </div>
                        <div class="group">
                            <div class="groupDate">
                                2/28
                            </div>
                            <div class="groupName">
                                陽明山兩天一夜
                            </div>
                            <div class="joinMember">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                            </div>
                        </div>
                        <div class="group">
                            <div class="groupDate">
                                1/17
                            </div>
                            <div class="groupName">
                                大坑玩耍
                            </div>
                            <div class="joinMember">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                                <img src="./pic/1.jpeg" class="memberIcon">
                            </div>
                        </div>
                    </div>
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