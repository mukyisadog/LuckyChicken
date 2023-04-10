<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>論壇文章內容</title>
    <link rel="stylesheet" href="{{ asset('css/forumDetail.css') }}">
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
                        @foreach($articles as $article)
                        <div>
                        <img src="data:image/jpeg;base64,{{base64_encode( $article->upicture)}}" >
                            <div>{{$article->name}}</div>
                            <i class="bi bi-suit-heart-fill"></i>
                        </div>
                        <div>
                            <h1>{{$article->title}}</h1>
                            <p>{{$article->createtime}}</p>
                        </div>
                        <div id="imgDiv">
                            <img src="data:image/jpeg;base64,{{base64_encode( $article->fpicture)}}" >
                        </div>
                        <div>
                            {{$article->content}}
                        </div>
                        @endforeach
                    </div>

                    <!-- 留言紀錄 -->
                    @if($FCquestions == null)
                        <div id="mesHis">
                            <div class="headDiv"> 
                                <div class="headDivChi">
                                </div>
                                <div class="headDivChi2">
                                    <p>還沒有人留言喔～</p>
                                    <p>快來當頭香～</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @else
                        <div id="mesHis">
                        @foreach($FCquestions as $FCquestion)
                            <div class="headDiv">
                                <div class="headDivChi">
                                    <img src="data:image/jpeg;base64,{{base64_encode($FCquestion->upicture)}}" >
                                    <p>{{$FCquestion->name}}</p>
                                </div>
                                <div class="headDivChi2">
                                    <p>{{$FCquestion->content}}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        </div>
                    @endif



                    
                    <!-- 留言 -->
                    <div id="mes">
                    @if (Auth::check())
                        <form method="post" action="/BigProject/public/forumCom/{{ $sfid }}/{{ $foid }}/{{ $uid }}" id="myForm">
                            @csrf
                            @foreach($userDatas as $userData)
                            <div class="formPic">
                                <img class="headDivPic" src="data:image/jpeg;base64,{{base64_encode( $userData->upicture)}}" >
                                <p>{{$userData->name}} ></p>
                            </div>
                            @endforeach
                                <textarea name="forumcom" id="feelcom" cols="30" rows="10" placeholder="留言...."></textarea>
                                <input type="submit" id="submitBtn" value="-送出-">
                        </form>
                        <script src="{{ asset('js/formtrim.js') }}"></script>
                    @else
                        <form method="post" action="#">
                            @csrf
                            @foreach($userDatas as $userData)
                            <div class="formPic">
                                <img class="headDivPic" src="data:image/jpeg;base64,{{base64_encode( $userData->upicture)}}" >
                                <p>{{$userData->name}} ></p>
                            </div>
                            @endforeach
                                <textarea name="forumcom" id="" cols="30" rows="10" placeholder="你需要先登入才能留言喔～" disabled></textarea>
                                <input type="button" value="-送出-">
                        </form>
                    @endif
                    </div>
                    <script>
                    
                    </script>
                </div>
                <div class="column2">
                    <aside>
                        <h1>最新文章</h1>
                        @foreach($forumNews as $forumNew)
                            <div class="article2">
                                <div class="article2Con">
                                    <a href="/BigProject/public/forumDetail/{{$forumNew->sfid}}/{{$forumNew->foid}}">
                                        <h4>{{$forumNew->title}}</h4>
                                    </a>
                                    <p>作者：{{$forumNew->name}}</p>
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