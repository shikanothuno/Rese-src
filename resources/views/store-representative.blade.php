@extends('layouts/layout-base')

@section('title')
    店舗代表者管理画面
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/store-representative.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <form class="input-form" action="{{ route("store-representative.update",$shop->id) }}" method="POST">
            @csrf
            @method("PUT")
            @foreach ($errors->all() as $error)
                <li class="error-message">{{ $error }}</li>
            @endforeach
            <table>
                <tr>
                    <td class="label">店名</td>
                    <td><input type="text" name="name" value="{{ $shop->name }}"></td>
                </tr>
                <tr>
                    <td class="label">Region</td>
                    <td>
                        <select name="region_id" id="">
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ $region->id == $shop->region_id ? 'selected' : '' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Genre</td>
                    <td>
                        <select name="genre_id" id="">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $genre->id == $shop->genre_id ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">説明</td>
                    <td><textarea name="description" id="" cols="30" rows="10">{{ $shop->description }}</textarea></td>
                </tr>
                <tr>
                    <td class="label">画像URL</td>
                    <td><input type="text" name="image_url" value="{{ $shop->image_url }}"></td>
                </tr>
            </table>
            <button class="submit-button" type="submit">更新</button>

        </form>

    </div>
    <div class="menu">
        <a href="{{ route("email.write") }}">お知らせメール作成</a>
        <a href="{{ route("shop-images.show",$shop->id) }}">お店の画像を表示</a>
        <a href="{{ route("shop-images.upload") }}">お店の画像を登録</a>
    </div>

</main>
@endsection

