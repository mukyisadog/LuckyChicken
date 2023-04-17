<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>與山同行</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/NavFooter.css')}}">
    <link rel="stylesheet" href="{{asset('css/carpool.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
   
    @yield('head')

</head>

<body>
    <div id="container">
        <nav id="navbar">
        <div class="logo"><a href="/BigProject/public/"><img src="./img/logo.jpg"></a></div>
            <ul class="menu">
                <li><a href="/BigProject/public/carpool">拼車</a></li>
                <li><a href="/BigProject/public/forumIndex">論壇</a></li>
                <li><a href="/BigProject/public/feelIndex">心得</a></li>
                @foreach($userPic as $Pic)
                    <li><a href="/BigProject/public/member/info"><img src="data:image/jpeg;base64,{{base64_encode($Pic->upicture)}}" ></a></li>
                @endforeach
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
                <li><a href="/BigProject/public/member/info">個人頁面</a></li>
            </ul>
        </nav>

        @yield('content')

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