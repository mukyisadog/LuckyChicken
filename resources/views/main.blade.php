<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/NavFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    @yield('head')

</head>

<body>
    <div id="container">
        <nav id="navbar">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('img/logo-2.jpg') }}">
                </a>
            </div>
            <ul class="menu">
                <li><a href="{{ route('cphome') }}">拼車</a></li>
                <li><a href="{{ route('feindex') }}">心得</a></li>
                <li><a href="{{ route('foqindex') }}">論壇</a></li>
                @if (Auth::check())
                    <li><button onclick="showNotice()" class="noticeBell"><i class="bi bi-bell"></i></button></li>
                    <?php $user = Auth::user(); ?>
                    @if (empty($user->upicture))
                        <li><a href="{{ route('mbinfo') }}"><img src="{{ asset('pic/admin.png') }}"></a></li>
                    @else
                        <li><a href="{{ route('mbinfo') }}"><img src="{{ $user->upicture }}"></a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}"><img src="{{ asset('pic/admin.png') }}"></a></li>
                @endif
            </ul>
        </nav>

        <!-- navbar for mobile -->
        <nav id="mobileNavbar">
            <div class="mobileLogo"><a href="/"><img src="{{ asset('img/logo-2.jpg') }}"></a></div>
            <label id="hamburgerIcon" for="hamburgerInput">
                <i class="bi bi-list"></i>
            </label>
            <input type="checkbox" id="hamburgerInput">
            <ul class="menuForMobile">
                @if (Auth::check())
                    <?php $user = Auth::user(); ?>
                    @if (empty($user->upicture))
                        <li><a href="{{ route('mbinfo') }}"><img src="{{ asset('pic/admin.png') }}"></a></li>
                    @else
                        <li><a href="{{ route('mbinfo') }}"><img src="{{ $user->upicture }}"></a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}"><img src="{{ asset('pic/admin.png') }}"></a></li>
                @endif
                <li><a href="{{ route('cphome') }}">拼車</a></li>
                <li><a href="{{ route('feindex') }}">心得</a></li>
                <li><a href="{{ route('foqindex') }}">論壇</a></li>
            </ul>
        </nav>

        <div id="notice">
            <h2>通知</h2>
            @if (count($notice) > 0)
                @foreach ($notice as $n)
                    @if ($n->type == 'App\Notifications\WannajoinNotice')
                        <div class="notification">
                            <span>[揪共乘] {{ $n->created_at }}</span><a href="{{ route('mbcp') }}">
                                <p>"{{ $n->data['joiner'] }}"{{ $n->data['message'] }}&#60;{{ $n->data['cptitle'] }}&#62;
                                </p>
                            </a>
                        </div>
                    @elseif($n->type == 'App\Notifications\ConfirmJoinNotice')
                        <div class="notification">
                            <span>[共乘確認] {{ $n->created_at }}</span><a href="{{ route('mbcp') }}">
                                <p>"{{ $n->data['poster'] }}"{{ $n->data['message'] }}&#60;{{ $n->data['cptitle'] }}&#62;{{ $n->data['message2'] }}
                                </p>
                            </a>
                        </div>
                    @elseif($n->type == 'App\Notifications\DeclineJoinNotice')
                        <div class="notification">
                            <span>[共乘確認] {{ $n->created_at }}</span><a href="{{ route('mbcp') }}">
                                <p>"{{ $n->data['poster'] }}"{{ $n->data['message'] }}&#60;{{ $n->data['cptitle'] }}&#62;{{ $n->data['message2'] }}
                                </p>
                            </a>
                        </div>
                    @elseif($n->type == 'App\Notifications\CpcommentNotice')
                        @if ($n->notifiable_id != $n->data['uid'])
                            <div class="notification">
                                <span>[共乘留言] {{ $n->created_at }}</span><a
                                    href="{{ route('cpinfo', ['cpid' => $n->data['cpid']]) }}">
                                    <p>"{{ $n->data['someone'] }}"{{ $n->data['message'] }} &#60;
                                        {{ $n->data['cptitle'] }} &#62; {{ $n->data['message2'] }}
                                        "{{ $n->data['comment'] }}"</p>
                                </a>
                            </div>
                        @endif
                    @elseif($n->type == 'App\Notifications\FeelCommentNotice')
                        @if ($n->notifiable_id != $n->data['uid'])
                            <div class="notification">
                                <span>[心得留言] {{ $n->created_at }}</span><a
                                    href="{{ route('fedetail', ['id' => $n->data['ftid']]) }}">
                                    <p>"{{ $n->data['someone'] }}"{{ $n->data['message'] }} &#60;
                                        {{ $n->data['title'] }}
                                        &#62; {{ $n->data['message2'] }} "{{ $n->data['comment'] }}"</p>
                                </a>
                            </div>
                        @endif
                    @elseif($n->type == 'App\Notifications\ForumCommentNotice')
                        @if ($n->notifiable_id != $n->data['uid'])
                            <div class="notification">
                                <span>[論壇留言] {{ $n->created_at }}</span><a
                                    href="{{ route('fodetail', ['sfid' => $n->data['sfid'], 'foid' => $n->data['foid']]) }}">
                                    <p>"{{ $n->data['someone'] }}"{{ $n->data['message'] }} &#60;
                                        {{ $n->data['title'] }}
                                        &#62; {{ $n->data['message2'] }} "{{ $n->data['comment'] }}"</p>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
            @else
                <p>沒有通知喔</p>
            @endif
        </div>

        <script>
            function showNotice() {
                var x = document.getElementById("notice");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
        
        @yield('content')

        <footer id="footer">
            <ul class="footerMenu">
                <li><a href="{{ route('cphome') }}">拼車</a></li>
                <li><a href="/feelIndex">心得</a></li>
                <li><a href="/forumIndex">論壇</a></li>
            </ul>
            <div id="left">Copyright © 2023 與山同行/Mountogether Rights Reserved.</div>
        </footer>
    </div>
</body>

</html>
