<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     *  ログインページの表示
     */
    public function login()
    {
        return view('login', ['email' => Null]);
    }

    /**
     *  ログイン処理
     *
     *  ログインできたら'/'にリダイレクト
     *  ログインできなかった場合エラーメッセージを表示する
     */
    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $credential = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($credential)) {
            return redirect('/');
        } else {
            return redirect('login')->with('result', 'メールアドレスまたはパスワードが違います');
        };
    }

    /**
     *  登録ページの表示
     */
    public function create()
    {
        return view('register');
    }

    /**
     *  登録処理
     *
     *  ログインにリダイレクト
     */
    public function store(Request $form)
    {
        User::create([
            'name' => $form->name,
            'email' => $form->email,
            'password' => Hash::make($form->password)
        ]);
        return redirect('/login');
    }

    /**
     *  ログアウト
     *
     *  ログアウト処理後、ログインにリダイレクト
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
