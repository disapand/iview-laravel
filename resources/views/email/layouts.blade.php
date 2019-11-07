<div>
    <h3>Zetin:</h3>
    <div style="text-indent: 2em">
        <p>亲爱的会员您好：</p>
        <p>请点击下面的链接激活账号完成注册：</p>
        <p><a href="{{ route('email_verification', ['token' => $token]) }}">
                {{ route('email_verification', ['token' => $token]) }}
            </a></p>
        <p>如果该链接无法点击，请直接拷贝以上链接到浏览器地址栏访问即可。</p>
        <p>如果不是本人操作，请忽略该邮件。</p>
    </div>
</div>