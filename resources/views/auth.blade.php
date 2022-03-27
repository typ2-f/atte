@extends('default.common')
@section('title', 'ログインページ')

@section('content')
    <section class="form" id="login">
        <form action="login" method="POST">
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

            <!--ログインボタン あとでコンポーネントからに変更-->
            <div class="md-form">
                <button class="btn-register" type="submit">ログイン</button>
            </div>
        </form>
    </section>
    <section class="title-login">
        <p class="msg-login">アカウントをお持ちでない方はこちらから</p>
        <a href="/register" class="link_register">会員登録</a>
    </section>
@endsection
