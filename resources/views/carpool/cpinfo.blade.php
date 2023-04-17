@extends('main')

@section('content')
        <div id="content-container">
            <h1 id="carpool-title">{{$title}}</h1>
            <div id="carpooldetail-container">
                <div id="userinfo1">
                    <img src="{{asset('img/dog1.jpg')}}" alt="">
                    <p>name</p>
                    <p>2023/04/10</p>
                </div>
                <div style="display: flex; justify-content: center; ">
                    <table>
                        <tr>
                            <td>
                                <h3>目的地 : <h3>
                            </td>
                            <td>{{$arrive}}</td>
                        </tr>
                        <tr>
                            @if($value == 1)
                            <td>我有車</td>
                            @elseif($value == 2)
                            <td>找包車</td>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                <h3>出發日期 : </h3>
                            </td>
                            <td>{{$departdate}}</td>
                        </tr>
                        <tr>
                            <td>
                                <h3>回程日期 : </h3>
                            </td>
                            <td>{{$returndate}}</td>
                        </tr>
                        <tr>
                            <td>
                                <h3>出發地點 : </h3>
                            </td>
                            <td>{{$depart}}</td>
                        </tr>
                        <tr>
                            <td>
                                <h3>內建人數 : </h3>
                            </td>
                            <td>{{$original}}</td>
                        </tr>
                        <tr>
                            <td>
                                <h3>欲徵人數 : </h3>
                            </td>
                            <td>{{$hire}}</td>
                        </tr>
                        <tr>
                            <td>
                                <h3>包車費用 : </h3>
                            </td>
                            <td>{{$cost}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 50px;">
                                <h3>備註 : </h3>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2" style="height: 50px;">{{$note}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="height: 50px;"></div>

            <div style="display: flex;justify-content: center;">
            @if(Auth::check())
                @if($uid != $id)
                    @if($n1 == 0)
                        <form method="post" action="" data-ajax="true">
                            @csrf
                            <input type="submit" id="joinbutton1" value="加入">
                        </form>
                    @elseif($status == 0)
                        <div id="joinbutton2">確認中</div>
                    @elseif($status == 1)
                        <div id="joinbutton2">已加入</div>
                    @elseif($status == 2)
                        <div id="joinbutton2">被拒絕</div>
                    @endif
                @else
                    <div style="height: 100px"></div> 
                @endif   
            @else
                <a href="{{route('login')}}" id="joinbutton2">加入</a>
            @endif
            </div>

            <div style="height: 50px;"></div>

            <div id="carpool-comment">
                <div id="mesHis">
                
                    <div class="headDiv">
                    
                    <div class="headDivChi">
                        <img class="headDivPic" src="../../img/dog1" >
                        <p>AAA</p>
                    </div>
                    <div class="headDivChi2">
                        <div>你好</div>
                    </div>
                </div>
                <hr>
    
                <!-- 留言 -->
                <div id="mes">
                    <!-- 這邊先寫死 後面記得改/BigProject/public/feelCom/1/1 因為不知道登入者是誰 -->
                    <form method="post" action="/BigProject/public/feelCom/1/1">
                        @csrf
                        <div class="formPic">
                            <img src="./pic/admin.png" alt="頭像">
                            <p>阿里 ></p>
                        </div>
                            <textarea name="feelcom" id="" cols="30" rows="10" placeholder="留言...."></textarea>
                            <input type="submit" value="-送出-">
                    </form>
                </div>
            </div>

            
        </div>
        <div style="height: 200px;"></div>



@endsection