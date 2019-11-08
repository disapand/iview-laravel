@extends('layouts._auth_layouts')

@section('style')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        input {
            border: none;
            background: none;
            outline: none;
        }

        input:-internal-autofill-previewed,
        input:-internal-autofill-selected {
            -webkit-text-fill-color: #FFFFFF !important;
            transition: background-color 5000s ease-in-out 0s !important;
        }

        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #eee;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #eee;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #eee;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #eee;
        }

        #app {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            background: url("../images/background_login.jpg");
        }


        .login-panel {
            display: flex;
            flex-direction: column;
            width: 305px;
            margin-top: 100px;
        }

        .login-title {
            color: #FFFFFF;
            text-align: center;
            text-shadow: 0 1px 4px rgba(0,0,0,.2);
        }

        .login-input {
            width: 270px;
            height: 42px;
            margin-top: 35px;
            padding: 0 15px;
            background: #2d2d2d; /* browsers that don't support rgba */
            background: rgba(45,45,45,.15);
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            border: 1px solid #3d3d3d; /* browsers that don't support rgba */
            border: 1px solid rgba(255,255,255,.55);
            -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
            -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
            box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
            font-family: 'PT Sans', Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0,0,0,.1);
            -o-transition: all .2s;
            -moz-transition: all .2s;
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
        }

        .login-error {
            color: #ef4300;
            font-size: .7em;
            margin: 10px 0;
            padding: 5px 15px;
            display: block;
            background: rgba(255, 255, 255, .55);
            border-left: 2px solid #ef4300;
            border-radius: 3px;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            min-height: 17px;
            opacity: 0;
            transition: all .3s ease-in-out;
        }

        .login-has-error {
            width: 270px;
            opacity: 1;
        }

        .login-btn {
            cursor: pointer;
            width: 300px;
            height: 44px;
            margin-top: 25px;
            padding: 0;
            background: #ef4300;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            border: 1px solid #ff730e;
            -moz-box-shadow:
                    0 15px 30px 0 rgba(255,255,255,.25) inset,
                    0 2px 7px 0 rgba(0,0,0,.2);
            -webkit-box-shadow:
                    0 15px 30px 0 rgba(255,255,255,.25) inset,
                    0 2px 7px 0 rgba(0,0,0,.2);
            box-shadow:
                    0 15px 30px 0 rgba(255,255,255,.25) inset,
                    0 2px 7px 0 rgba(0,0,0,.2);
            font-family: 'PT Sans', Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0,0,0,.1);
            -o-transition: all .2s;
            -moz-transition: all .2s;
            -webkit-transition: all .2s;
            -ms-transition: all .2s;
        }

        .register-btn {
            color: #999;
            font-size: .8em;
            margin-top: 10px;
            cursor: pointer;
            text-align: right;
            padding-right: 5px;
        }

        .other-way {
            color: #FFFFFF;
            text-align: center;
        }

        .other-way-btn {
            margin: 15px auto;
            background: url(../images/wechat.png);
            height: 30px;
            width: 30px;
            background-size: cover;
            cursor: pointer;
        }

    </style>
@stop

@section('content')
    <div id="app">
        <form class="login-panel" method="POST" action="{{ route('loginMember') }}" @submit="login">
            {{ csrf_field() }}
            <div class="login-title">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <input type="text" v-model="email" placeholder="请输入您的账号" class="login-input" name="email" autocomplete="off">
            <input type="password" v-model="password" placeholder="请输入您的密码" class="login-input" name="password" autocomplete="new-password">
            <input type="password" style="display: none">
            <button class="login-btn" type="submit">登  录</button>
            <span class="register-btn" @click="register">还没有账号？点此注册 >>></span>
            <span class="login-error" :class="err ? 'login-has-error' : ''">@{{ err }}</span>
            <span class="login-error {{ count($errors) > 0 ? 'login-has-error' : '' }}">
                {{ $errors->first() }}
            </span>
{{--            <div class="other-way">--}}
{{--                <span class="other-way-title">使用微信登录</span>--}}
{{--                <div class="other-way-btn" @click="loginWithWx"></div>--}}
{{--            </div>--}}
        </form>
    </div>
@stop

@section('script')
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                err: '',
                email: '',
                password: ''
            },
            methods: {
                login() {
                    console.log('11111')
                    let reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/
                    if(reg.test(this.email)) {
                        this.err = ''
                    } else {
                        this.err = "邮箱格式不正确"
                        event.preventDefault()
                    }

                    if(!this.err) {

                    } else {
                        event.preventDefault()
                    }
                },
                loginWithWx() {
                    console.log('222222')
                },
                register() {
                    window.location.href = "/register"
                }
            }
        })
    </script>
@stop