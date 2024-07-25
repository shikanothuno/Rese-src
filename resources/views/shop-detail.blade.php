@extends('layouts/layout-base')

@section('title')
    店舗詳細ページ
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/shop-detail.css") }}">
@endsection

@section('content')
<main>
    <div class="shop-detail">
        <div class="shop-detail-header">
            <a class="back-button" href="{{ route("shop-list") }}">&lt</a>
            <h1 class="shop-name">{{ $shop->name }}</h1>
        </div>
        <div class="shop-img__div">
            <img src="{{ asset($shop->image_url) }}" alt="">
        </div>
        <div class="shop-region-and-genre">
            {{ "#" . $shop->region->name . " " . "#" . $shop->genre->name }}</div>
        <div class="shop-description">{{ $shop->description }}</div>
    </div>
    <div class="reservation">
        <div class="title">予約</div>
        @foreach ($errors->all() as $error)
            <li class="error-message">{{ $error }}</li>
        @endforeach
        <form class="reservation-form" id="reservation-form" action="{{ route("reservation.store",$shop->id) }}" method="POST">
            @csrf
            <input class="date" type="date" id="date" name="date" value="{{ old("date") }}" required>
            <br>
            <input class="time" type="time" id="time" name="time" value="{{ old("time") }}" required>
            <br>
            <select class="people" id="people" name="number_of_people_booked">
                <option value="">--選択してください。--</option>
                @for ($i = 1; $i <= 20; $i++)
                    <option value={{ $i }} {{ $i == old("number_of_people_booked") ? 'selected' : '' }}>{{ $i . "人" }}</option>
                @endfor
            </select>
        </form>
            <br>
            <div class="reservation-detail">
                <table class="reservation-detail__table">
                    <tr>
                        <td>Shop</td>
                        <td>{{ $shop->name }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><span id="date-preview"></span></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td><span id="time-preview"></span></td>
                    </tr>
                    <tr>
                        <td>Number</td>
                        <td><span id="people-preview"></span>人</td>
                    </tr>
                </table>
            </div>

        <button class="submit-button" onclick="document.getElementById('reservation-form').submit()">予約する</button>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset("js/shop-detail.js") }}"></script>
@endsection

