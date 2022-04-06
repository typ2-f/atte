@extends('default.common')
@section('title','atte-ログイン')
@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection


@section('content')
    <section class="form" id="login">
        <form action='/login' method='post'>
            @csrf
            <div class="form-input">
                <input type='text' name='email' required value="{{ old('email') }}" placeholder="メールアドレス">
            </div>
            <div class="form-input">
                <input type='password' name='password' required placeholder="パスワード">
            </div>
            <x-button>
                ログイン
            </x-button>
        </form>
    </section>
    <section class="title-register">
        <p class="msg-login">アカウントをお持ちでない方はこちらから</p>
        <a href="/register" class="link_register">会員登録</a>
    </section>
@endsection
