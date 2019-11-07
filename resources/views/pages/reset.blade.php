@extends('layouts._layouts')

@section('content')
<div class="container" style="width: 500px;height: 500px">
    <form role="form" method="post" action="{{ route('updatePassword') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">新密码</label>
            <input type="password" class="form-control" name="password" placeholder="请输入新密码">
        </div>
        <div class="form-group">
            <label for="name">确认密码</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="请确认新密码">
        </div>
        <button type="submit" class="btn btn-default" style="width: 100%">提交</button>
        <input type="hidden" name="id" value="{{ $member['id'] }}">

        @if(count($errors) > 0)
            <div class="bg-danger" style="color: #333; padding: 10px">
                {{ $errors->first() }}
            </div>
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