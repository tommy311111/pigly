@extends('layouts.guest')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/register_step2.css') }}">
@endpush

@section('title', '新規会員登録')
@section('heading', '新規会員登録')

@section('step')
    <div class="step-label">STEP2 体重データの入力</div>
@endsection

@section('content')
    <form method="POST" action="{{ route('register.step2.post') }}">
        @csrf

        <label for="weight">現在の体重</label>
        <div class="weight-input-container">
            <input type="text" id="weight" name="weight" placeholder="現在の体重を入力" value="{{ old('weight') }}">
            <span class="weight-unit">kg</span>
        </div>
        @error('weight')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="target_weight">目標体重</label>
        <div class="weight-input-container">
            <input type="text" id="target_weight" name="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}">
            <span class="weight-unit">kg</span>
        </div>
        @error('target_weight')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <input type="submit" class="submit-button" value="アカウント作成">
    </form>
@endsection
