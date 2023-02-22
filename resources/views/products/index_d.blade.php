@extends('layouts.app')
@section('content')
    <p><a href="{{ route('products.create') }}">商品を追加する</a></p>
        @foreach ($products as $product)
        <article class="article-item">
            <div class="article-title">{{ $product->maker }}</div>
            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
            <div class="article-info">{{ $product->created_at }}</div>
        </article>
        @endforeach
@endsection()