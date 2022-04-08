@extends('default.common')
@section('title', 'atte-ログイン')



@section('content')
    <h1 class='content-ttl'>ログイン</h1>

    <!--divタグ直後の全角スペースで常に文字を存在させる-->
    <div class='flash-message'>　
        @if (session('error'))
            {{ session('error') }}
        @endif
    </div>

    <section class='form' id='login'>
        <form action='/login' method='post'>
            @csrf
            <div class='form-element'>
                <input type='text' class='form-input' name='email' required value='{{ old('email') }}'
                    placeholder='メールアドレス'>
            </div>
            <div class='form-element'>
                <input type='password' class='form-input' name='password' required placeholder='パスワード'>
            </div>
            <x-button>
                ログイン
            </x-button>
        </form>
    </section>
    <section class='guidance'>
        <p class='guidance-msg'>アカウントをお持ちでない方はこちらから</p>
        <a href='/register' class='link_register'>会員登録</a>
    </section>
@endsection
