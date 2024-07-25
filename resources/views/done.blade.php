@extends('layouts/layout-base')

@section('title')
    ご予約ありがとうございます
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/done.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="message-box">
          <p class="message">ご予約ありがとうございます</p>
          <a href="{{ route("shop-list") }}" class="back-button">戻る</a>
        </div>
    </div>
</main>
@endsection

