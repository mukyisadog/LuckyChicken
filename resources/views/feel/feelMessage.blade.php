@extends('main')


@section('head')
<title>心得發表</title>
    <link rel="stylesheet" href="{{ asset('css/feelMessage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    

@endsection


@section('content')
<div id="content-container">
            <br><br>
            <h1>分享心得</h1>
            <div id="FormContainer">
                <form method="post" action="{{ route('feelmes')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    選擇封面：<br>
                    <p></p>
                    <input type="file" id="photo-upload" name="pic" accept="image/*" required>
                    <div id="preview"></div>
                    <script src="{{asset('js/MesCanva.js')}}"></script>
                    <hr>
                    <input type="text" placeholder="輸入標題" name="title" id="title" minlength="5" required>
                    <br>
                    <textarea placeholder="輸入內容" name="content" id="textarea" minlength="10" required></textarea>
                    <br><br>
                    <hr>
                    <div id="bt">
                        <button type="submit" value="0" name="btValue">儲存</button>
                        <button type="submit" value="1" name="btValue">發布</button>
                    </div>
                </form>
            </div>
            <br><br>
        </div>
        @if(session()->has('answer'))
            @if(session('answer') === 1)
                <script>alert("發佈成功！")</script>
            @else
                <script>alert("發佈失敗！請重新選擇片")</script>
            @endif
        @endif

@endsection