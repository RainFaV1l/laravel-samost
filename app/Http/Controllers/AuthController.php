<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:users,name',
            'password' => 'required|min:6|same:password_r',
        ], [
            'name.min' => 'Минимальная длина 3 символа',
            'required' => 'Обязательна к заполнению',
            'name.unique' => 'Данный логин уже зарегистрирован',
            'password.min' => 'Минимальная длина 6 символов',
            'password.same' => 'Пароли не совпадают',
        ], [
            'name' => 'имя пользователя',
            'password' => 'пароль',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $user = User::query()->create(
            ['password' => Hash::make($request['password'])] + $validator->validated(),
        );

        Auth::login($user);
        return redirect(route('index.index'));

    }

    public function logout() {
        Auth::logout();
        return redirect(route('index.index'));
    }

    public function signin(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'password' => 'required|min:6',
        ], [
            'name.min' => 'Минимальная длина 3 символа',
            'required' => 'Обязательна к заполнению',
            'password.min' => 'Минимальная длина 6 символов',
        ], [
            'name' => 'имя пользователя',
            'password' => 'пароль',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        if(!Auth::attempt($validator->validated())) {
            return back()->withErrors(['invalid' => 'Неверный логин или пароль']);
        }

        if(Auth::user()->role === 0) {
            Auth::logout();
            return redirect()->route('blocked');
        }

        return redirect(route('index.index'));

    }
}
