@extends('layouts._auth_layouts')

@section('style')
    <style>
        .content {
            text-align: center;
            padding: 100px;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .body{
            height: 100vh;
            width: 100vw;
            background: url(../images/background_verified.jpg);
        }

        .h1 {
            font-size: 2em;
            font-weight: bold;
            color: #FFFFFF;
        }

        p{
            color: #FFFFFF;
        }

        a, a:hover, a:active, a:visited {
            color: #0E7FE7;
        }

        strong {
            color: #0E7FE7;
        }
    </style>
@stop

@section('content')
<div class="body">
    @if(Auth::guard('member')->check() && !Auth::guard('member')->user()->verified&&!Request::is('email_verification_required'))
        <div class="content">
           <span class="h1">
               激活邮件已发送至您的邮箱，请前往邮箱 <strong>{{ Auth::guard('member')->user()->email }}</strong> 查看
           </span>
            <p>
                如果您没有收到邮件，<a href="{{ route('email_verification_required') }}">点此重新发送</a>，或者前往垃圾箱查看是否被拦截
            </p>
        </div>
    @endif

</div>
@stop