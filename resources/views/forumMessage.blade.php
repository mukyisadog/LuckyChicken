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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
</head>

<body>
    <div id="container">
        <nav id="navbar">
            <div class="logo"><a href="/BigProject/public/"><img src="./img/logo.jpg"></a></div>
            <ul class="menu">
                <li><a href="#">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                @foreach($userPic as $Pic)
                    <li><a href="#"><img src="data:image/jpeg;base64,{{ base64_encode($Pic->upicture)}}"></a></li>
                @endforeach
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
            <h1>論壇發表</h1>
            <div id="FormContainer">
                <form method="post" action="/BigProject/public/forumMes/{{$uid}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    選擇封面：<br>
                    <p></p>
                    <input type="file" id="photo-upload" name="pic" accept="image/*" required>
                    <div id="preview"></div>
                    <script src="{{asset('js/mesCanva.js')}}"></script>
                    <hr>
                    選看板：
                    <input type="radio" name="sfid" id="" value="1" required>問題
                    <input type="radio" name="sfid" id="" value="2" required>揪團
                    <input type="radio" name="sfid" id="" value="3" required>黑特
                    <hr>
                    <input type="text" placeholder="輸入標題" name="title" minlength="5" required>
                    <br>
                    <textarea placeholder="輸入內容" name = "content" minlength="10" required></textarea>
                    <br><br>
                    <hr>
                    <div id="bt">
                        <input type="submit" value="發布">
                        <input type="submit" value="儲存" onclick="changeAction()">
                    </div>
                </form>
                <script>
                    function changeAction(){
                        document.getElementById('myForm').action = "/BigProject/public/forumMesSaved/{{$uid}}";
                    }                
                </script>
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