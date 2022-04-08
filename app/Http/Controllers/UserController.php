<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
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
            return back()->withInput()->with('error', 'メールアドレスまたはパスワードが違います');
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
        try {
            User::create([
                'name' => $form->name,
                'email' => $form->email,
                'password' => Hash::make($form->password)
            ]);
        } catch (QueryException $e) {

            //既に存在するemail->1062エラーでcreateできないときエラー文を返す
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return back()->withInput()->with(['error' => 'このアドレスはすでに使用されています']);
            }
        }
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
