@extends('layouts._layouts')

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


        html, body {height:100%;overflow:auto;margin: 0;}
        html{overflow-y:scroll;}

        input {
            padding: 10px;
        }

        input[value=''] {
            border-bottom: 1px solid #ddd;
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

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .input-field {
            display: block;
            margin: 20px auto;
        }

        .form-item {
            min-height: 50px;
            padding: 0 50px;
            display: flex;
            align-items: center;
        }

        .form-item input {
            min-width: 300px;
        }

        .form-item:nth-child(2n) {
            background: #f8f8f8;
        }

        .form-label {
            width: 70px;
            text-align-last: justify;
            margin-right: 20px;
        }

        button {
            margin: 0;
            padding: 0;
            border: none;
            outline: none;
        }

        .btn-field {
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
            margin: 20px;
        }
    </style>
@stop

@section('content')
<div class="content">
    <form action="{{ route('update') }}" method="post" class="input-field">
        {{ csrf_field() }}
        <div class="form-item">
            <span class="form-label">邮箱</span>
            <input type="text" name="email" value="{{ $member['email'] }}" disabled>
        </div>

        <div class="form-item">
            <span class="form-label">联系人</span>
            <input type="text" name="name" value="{{ $member['name'] }}">
        </div>

        <div class="form-item">
            <span class="form-label">电话</span>
            <input type="text" name="phone" value="{{ $member['phone'] }}">
        </div>

        <div class="form-item">
            <span class="form-label">公司</span>
            <input type="text" name="company" value="{{ $member['company'] }}">
        </div>

        <div class="form-item">
            <span class="form-label">联系地址</span>
            <input type="text" name="address" value="{{ $member['address'] }}">
        </div>

        <div class="form-item">
            <span class="form-label">注册时间</span>
            <input type="text" value="{{ $member['created_at'] }}" disabled>
        </div>

        <div class="btn-field">
            <button type="button" class="btn btn-info" style="border-radius: 5px" onclick="resetPassword()">重置密码</button>
            <button type="submit" class="btn btn-success" style="border-radius: 5px">保存信息</button>
        </div>

        @if (count($errors) > 0)
            <p class="bg-primary" style="padding: 10px">{{ $errors->first() }}</p>
        @endif

    </form>
</div>
@stop

@section('script')
    <script>
        function resetPassword() {
            window.location.href = "/resetPassword"
        }
    </script>
@stop