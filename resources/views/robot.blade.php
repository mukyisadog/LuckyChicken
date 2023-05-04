<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>客服</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/NavFooter.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
</head>

<body>
<div>
    @if(isset($datas))
        @foreach($datas as $data)
            @if($data->state)
            <div class="contentAi">
                {{$data->content}}
            </div><br>
            @else
            <div class="contentMe">
                {{$data->content}}
            </div><br>
            @endif
        @endforeach
    @endif
</div>
<form id="chat-window" type="get" action="{{route('saveContent')}}">
    <div id="messages"></div>
    <input type="text" id="input-box" name="message">
    <input type="submit" id="send-button" name="Send">
</form>
</body>
