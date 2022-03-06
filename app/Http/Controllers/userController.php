<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function check()
    {
        $text = ['text' => 'ログインして下さい。'];
        return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            $text = Auth::user()->name . 'さんがログインしました';
        } else {
            $text = 'ログインに失敗しました';
        }
        return view('auth', ['text' => $text]);
    }

    /**
     *  ログインページの表示
     */
    public function login()
    {
        return view('login');
    }

    /**
     *  ログイン処理
     *
     *  ログインできたら/homeにリダイレクト
     *  できなかった場合エラーメッセージを表示する
     */
    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(
            [
                'email' => $email,
                'password' => $password
            ]
        )) {
            redirect('/');
        }
    }

    /**
     *  登録ページの表示
     */
    public function register()
    {
        return view('register');
    }

    /**
     *  登録処理
     *
     *  登録が出来たらログインにリダイレクト
     */
    public function add(Request $request)
    {
    }
}
