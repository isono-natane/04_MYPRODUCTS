@extends('layouts.app')
@section('content')
<div class="welcome">
    <h1>Eazy Search</h1>
    @auth
    <a class="btn" href="{{ route('home') }}">マイページ</a>
    <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">

        @csrf
        <button type="submit" class="btn btn-sm btn-dark">ログアウト</button>
    </form>

    @else
    <a class="btn" href="{{ route('register') }}">会員登録</a>
    <a class="btn" href="{{ route('login') }}">ログイン</a>
    @endauth
</div>
@endsection()
