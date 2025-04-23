@extends('layouts.guest')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/register_step1.css') }}">

@section('title', 'ログイン')
@section('heading', 'ログイン')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}">
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" placeholder="パスワードを入力">
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <input type="submit" class="submit-button" value="ログイン">
    </form>

    <a class="login-link" href="{{ route('register.step1') }}">アカウント作成はこちら</a>
@endsection
