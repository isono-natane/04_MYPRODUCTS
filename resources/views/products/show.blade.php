@extends('layouts.app')
@section('content')
<article class="">
    <dl>
        <dt>id</dt>
        <dd class="">{!! nl2br(e($product->name)) !!}</dd>
        <dt>name</dt>
        <dd class="">{!! nl2br(e($product->id)) !!}</dd>
        <dt>create_at</dt>
        <dd class="">{!! nl2br(e($product->created_at)) !!}</dd>
        <dt>maker</dt>
        <dd class="">{!! nl2br(e($product->maker)) !!}</dd>
        <dt>price</dt>
        <dd class="">{!! nl2br(e($product->price)) !!}</dd>
    </dl>
    <div class="">
        <a href="{{ route('products.edit', $product) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('products.destroy', $product) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
        <a href="{{ route('home') }}">管理画面に戻る</a>
    </div>
</article>
@endsection
