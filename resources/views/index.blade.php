<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/NavFooter.css') }}"> -->
    <title>與山同行</title>

</head>


<body>
    <div id="memberSection">
    @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();"
                            id="BtLogin">
                {{ __('登出') }}
            </x-dropdown-link>
        </form>
        <?php $user = Auth::user(); ?>
        <a href="{{ route('mbinfo') }}"><img src="{{ $user->upicture }}" id="memberIcon"></a>
    @else
        <a href="{{ route('login') }}"><button id="BtLogin">登入/註冊</button></a>
    @endif
    </div>

<div id="mainContent">
    <div id="logo"><img src="{{ asset('img/logo.jpg') }}"></div>
    <div id="section1">
        <a href="{{ route('cphome') }}" class="webFeature">
            <div class="pngDiv">
                <img src="{{ asset('img/vehicle.png') }}" class="homePng">
            </div>
            <div class="featureTitle">拼車</div>
        </a>
        <a href="{{ route('feindex') }}" class="webFeature">
            <div class="pngDiv">
                <img src="{{ asset('img/chat.png') }}" class="homePng">
            </div>
            <div class="featureTitle">心得</div>
        </a>
        <a href="{{ route('foindex') }}" class="webFeature">
            <div class="pngDiv">
                <img src="{{ asset('img/group.png') }}" class="homePng">
            </div>
            <div class="featureTitle">論壇</div>
        </a>
    </div>

    <div id="newFeel">
    <h2>最新心得</h2>
    <div class="sliderContainer">
        <div class="slider responsive">
        @foreach($feeldatas as $data)
            <div class="card">
                <img src="data:image/jpeg;base64,{{base64_encode($data->fpicture)}}">
                <h5>{{$data->title}}</h5>
                <p>作者：{{$data->name}}</p>
                <p>發表日期：{{$data->createtime}}</p>
                <div style="margin: 24px 0;">
                </div>
                <a href="{{ route('fedetail', ['id' => $data->fid]) }}">
                    <button>閱讀</button>
                </a>
            </div>
        @endforeach
        </div>
    </div>
    </div>

    <div id="newForum">
    <h2>最新討論</h2>
    <div class="sliderContainer">
        <div class="slider responsive">
        @foreach($forumdatas as $data)
            <div class="card">
                <img src="data:image/jpeg;base64,{{base64_encode($data->fpicture)}}">
                <h5>{{$data->title}}</h5>
                <p>作者：{{$data->name}}</p>
                <p>發表日期：{{$data->createtime}}</p>
                <div style="margin: 24px 0;">
                </div>
                <a href="{{ route('fodetail',['sfid'=>$data->sfid,'foid'=>$data->foid]) }}">
                    <button>閱讀</button>
                </a>
            </div>
        @endforeach
        </div>
    </div>
    </div>
    <!-- 輪播控制 -->
    <script src="{{ asset('js/index.js') }}"></script>
<footer id="footer">
    <div id="left">Copyright © 2023 與山同行/Mountogether Rights Reserved.</div>
    <ul class="menu">
        <li><a href="{{route('cphome')}}">拼車</a></li>
        <li><a href="/feelIndex">心得</a></li>
        <li><a href="/forumIndex">論壇</a></li>
    </ul>
</footer>
</div>


</body>

</html>