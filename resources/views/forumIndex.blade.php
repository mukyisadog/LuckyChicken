<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/NavFooter.css">
    <link rel="stylesheet" href="./css/forumIndex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>論壇首頁</title>
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
            <br>
            <div class="row">
                <div class="column1">
                    <h1>論壇</h1>
                    <div id="tabContainer">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'abc')" id="defaultOpen">問題</button>
                            <button class="tablinks" onclick="openCity(event, 'Paris')">揪團</button>
                            <button class="tablinks" onclick="openCity(event, 'Tokyo')">黑特</button>
                        </div>
                        <div id="abc" class="tabcontent">
                            <form class="example">
                                <input type="text" placeholder="輸入關鍵字" name="search" id="search-input">
                                <button type="button" id="searchbt">搜索</button>
                            </form>
                            <div id="articles">
                                @foreach($questions as $question)
                                        <div class="article">
                                            <div class="articlePic">                 
                                                <img src="data:image/jpeg;base64,{{base64_encode($question->fpicture)}}" >
                                            </div>
                                            <div class="articleCon">
                                                <a href="/BigProject/public/forumDetail/1/{{$question->foid}}">
                                                    <h4 class="searchtitle">{{$question->title}}</h4>
                                                </a>
                                                <h5>作者：{{$question->name}}</h5>
                                                <h5>發布日期：{{$question->createtime}}</h5>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="Paris" class="tabcontent">
                            <form class="example">
                                <input type="text" placeholder="輸入關鍵字" name="search" id="search-input">
                                <button type="button" id="searchbt">搜索</button>
                            </form>
                            <div id="articles">
                            @foreach($groups as $group)
                                        <div class="article">
                                            <div class="articlePic">                 
                                                <img src="data:image/jpeg;base64,{{base64_encode($group->fpicture)}}" >
                                            </div>
                                            <div class="articleCon">
                                                <a href="/BigProject/public/forumDetail/2/{{$group->foid}}">
                                                    <h4 class="searchtitle">{{$group->title}}</h4>
                                                </a>
                                                <h5>作者：{{$group->name}}</h5>
                                                <h5>發布日期：{{$group->createtime}}</h5>
                                            </div>
                                        </div>
                            @endforeach
                            </div>
                        </div>
                        <div id="Tokyo" class="tabcontent">
                            <form class="example">
                                <input type="text" placeholder="輸入關鍵字" name="search" id="search-input">
                                <button type="button" id="searchbt">搜索</button>
                            </form>
                            <div id="articles">
                            @foreach($haters as $hater)
                                        <div class="article">
                                            <div class="articlePic">                 
                                                <img src="data:image/jpeg;base64,{{base64_encode($hater->fpicture)}}" >
                                            </div>
                                            <div class="articleCon">
                                                <a href="/BigProject/public/forumDetail/3/{{$hater->foid}}">
                                                    <h4 class="searchtitle">{{$hater->title}}</h4>
                                                </a>
                                                <h5>作者：{{$hater->name}}</h5>
                                                <h5>發布日期：{{$hater->createtime}}</h5>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <script>
                        bt = document.getElementById("searchbt")
                        bt.onclick = function () {
                            event.preventDefault();
                            const titles = Array.from(document.querySelectorAll(".searchtitle")).map(title => title.textContent);
                            console.log(titles);
                            const searchinput = document.getElementById("search-input");
                            const articles = Array.from(document.querySelectorAll(".article"));
                            // console.log(articles);

                            let reg1 = /\w/g
                            let reg2 = /[\u4E00-\u9FFF]/g
                            if (reg1.test(searchinput.value.trim()) == true || reg2.test(searchinput.value.trim()) == true) {
                                if (searchinput.value.trim() == "") {
                                    alert("請輸入關鍵字");
                                    articles.forEach(article => article.classList.remove("unmatched"));
                                }
                                else {
                                    b = new RegExp(`${searchinput.value.trim()}`, 'gi')
                                    // console.log(b)
                                    let arr = []
                                    for (let i = 0; i < titles.length; i++) {
                                        result = titles[i].matchAll(b);
                                        
                                        if (Array.from(result).length > 0) {
                                            arr.push(titles[i]);
                                            articles[i].classList.remove("unmatched");
                                        }else{
                                            articles[i].classList.add("unmatched");    
                                        }
                                    }
                                    if (arr == "") {
                                        alert("找不到相關內容");
                                        articles.forEach(article => article.classList.remove("unmatched"));
                                        // console.log('123');
                                    } 
                                    else { 
                                        
                                    }
                                }
                            }else{
                                alert("請輸入關鍵字");
                                articles.forEach(article => article.classList.remove("unmatched"));
                            }
                            
                        }
                    </script>

                </div>
            <script src="{{ asset('js/forumIndex.js') }}"></script>
            @auth
                <button id="btPublish" onclick="window.location.href='/BigProject/public/forumMessage/{{$uid}}'">
                    發文
                </button>
            @endauth
                    <aside class="column2">
                        <h1>-最新文章-</h1>
                        @foreach($forumNew2s as $forumNew2)
                            <div class="article2">
                                <div class="article2Con">
                                    <a href="/BigProject/public/feelDetail/{{$forumNew2->foid}}">
                                        <h4>{{$forumNew2->title}}</h4>
                                    </a>
                                    <p>作者：{{$forumNew2->name}}</p>
                                </div>
                            </div>
                        @endforeach    
                    </aside>
                </div>
            </div>

            <div id="abcc"></div>

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