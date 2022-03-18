@extends('default.common')

@section('content')
    <form action='/register' method='post'>
        <table>
            @csrf
            <tr>
                <th>名前：</th>
                <td><input type='text' name='name'></td>
            </tr>
            <tr>
                <th>メール：</th>
                <td><input type='text' name='email'></td>
            </tr>
            <tr>
                <th>パスワード：</th>
                <td><input type='password' name='password'></td>
            </tr>
        </table>
        <button type='submit'>登録</button>
    </form>
@endsection
