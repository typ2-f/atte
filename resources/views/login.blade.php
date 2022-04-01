@extends('default.common')

@section('content')
    <section class="form" id="login">
        <form action='/login' method='post'>
            <table>
                @csrf
                <tr>
                    <th>メール：</th>
                    <td><input type='text' name='email'></td>
                </tr>
                <tr>
                    <th>パスワード：</th>
                    <td><input type='password' name='password'></td>
                </tr>
            </table>
            <button type='submit'>ログイン</button>
        </form>
    </section>
    <section class="title-register">
        <p class="msg-login">アカウントをお持ちでない方はこちらから</p>
        <a href="/login" class="link_login">会員登録</a>
    </section>
@endsection
