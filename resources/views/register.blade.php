@extends('default.common')

@section('content')
    <section class="form" id="register">
        <form action="register" method="POST">
            @csrf
            <!--名前-->
            <div class="md-form">
                <input type="text" name="name" required value="{{ old('name') }}" placeholder="名前">
            </div>

            <!--メールアドレス-->
            <div class="md-form">
                <input type="text" name="email" required value="{{ old('email') }}" placeholder="メールアドレス">
            </div>

            <!--パスワード-->
            <div class="md-form">
                <input type="password" name="password" required value="{{ old('password') }}" placeholder="パスワード">
            </div>

            <!--会員登録ボタン あとでコンポーネントからに変更-->
            <div class="md-form">
                <button class="btn-register" type="submit">会員登録</button>
            </div>
        </form>
    </section>
    <section class="title-login">
        <p class="msg-login">アカウントをお持ちの方はこちらから</p>
        <a href="/login" class="link_login">ログイン</a>
    </section>
@endsection
