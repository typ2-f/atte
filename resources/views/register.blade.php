@extends('default.common')
@section('title', 'atte-登録')



@section('content')
    <h1 class="content-ttl">会員登録</h1>

    <div class="flash-message">
        @if (session('result'))
            {{ session('result') }}
        @endif
    </div>
    <section class="form" id="register">
        <form action="register" method="POST">
            @csrf
            <!--名前-->
            <div class="form-element">
                <input type="text" class="form-input" name="name" required value="{{ old('name') }}" placeholder="名前">
            </div>

            <!--メールアドレス-->
            <div class="form-element">
                <input type="text" class="form-input" name="email" required value="{{ old('email') }}"
                    placeholder="メールアドレス">
            </div>

            <!--パスワード-->
            <div class="form-element">
                <input type="password" class="form-input" name="password" required placeholder="パスワード">
            </div>
            <!--パスワード確認-->
            <div class="form-element">
                <input type="password" class="form-input" name="pass-check" required placeholder="パスワード確認用">
            </div>
            <div>
                <x-button>
                    会員登録
                </x-button>
            </div>
        </form>
    </section>
    <section class="guidance">
        <p class="guidance-msg">アカウントをお持ちの方はこちらから</p>
        <a href="/login" class="link_login">ログイン</a>
    </section>
@endsection
