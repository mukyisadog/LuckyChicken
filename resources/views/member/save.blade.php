<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>收藏</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/NavFooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/member-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/save.css')}}">
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
                <h1>收藏</h1>
            </div>

            <div id="mainContent">
                <div id="leftBar">
                    <ul>
                        <li><a href="info">個人資料</a></li>
                        <li><a href="carpool">拼車/揪團紀錄</a></li>
                        <li><a href="forum">論壇</a></li>
                        <li><a href="feel">心得</a></li>
                        <li class="current"><a href="save">收藏</a></li>
                    </ul>
                </div>

                <div id="mobileLeftBar">
                    <ul>
                        <li><a href="info">個人資料</a></li>
                        <li><a href="carpool">拼車/揪團紀錄</a></li>
                        <li><a href="forum">論壇</a></li>
                        <li><a href="feel">心得</a></li>
                        <li class="current"><a href="save">收藏</a></li>
                    </ul>
                </div>

                <div class="mainContent">
                    <div id="feelSave">
                        <h2>心得</h2>
                        <div class="article">
                            <div class="articleDate">
                                3/15
                            </div>
                            <div class="articleTitle">
                                【六順山七彩湖】五天步行107公里-探訪中央山脈心臟地帶
                            </div>
                        </div>
                        <div class="article">
                            <div class="articleDate">
                                2/13
                            </div>
                            <div class="articleTitle">
                            2023 臺北大縱走 7：飛龍步道至指南宮竹柏參道
                            </div>
                        </div>
                        <div class="article">
                            <div class="articleDate">
                                1/5
                            </div>
                            <div class="articleTitle">
                            新手登山常見的 12 個問題（高山症、雨衣、備用衣物、山屋、上廁所、生理期、體能）
                            </div>
                        </div>
                    </div>
<hr/>
                    <div id="forumSave">
                        <h2>論壇</h2>
                        <div class="article">
                        <div class="articleDate">
                                3/18
                            </div>
                            <div class="articleTitle">
                                魚路古道：石門的茶金歲月
                            </div>
                        </div>
                        <div class="article">
                            <div class="articleDate">
                                1/5
                            </div>
                            <div class="articleTitle">
                                【羊畢羊 一日單攻 】鋸齒連峰值得一探嗎？畢祿山風景超讚！
                            </div>
                        </div>
                        <div class="article">
                            <div class="articleDate">
                                1/3
                            </div>
                            <div class="articleTitle">
                                【裝備】繞境裝備怎麼帶？大甲媽祖穿搭一次看！
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