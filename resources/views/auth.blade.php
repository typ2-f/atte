@extends('default.common')
@section('title', 'ログインページ')

@section('content')
    <p>{{$text}}</p>
    <form action='/check' method='post'>
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
@endsection
