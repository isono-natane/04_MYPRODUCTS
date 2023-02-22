@csrf
<dl class="form-list">
    <dt>カテゴリ</dt>
    <dd>
        <select name="category_id" class="form-select">
            <option value=""></option>
            @foreach (App\Models\Category::all() as $category)
            {{-- <option value="{{ $category->id }}" @if(old('category_id') == $category->id ) selected @endif> --}}
            <option value="{{ $category->id }}"
                 @if(old('category_id',$product->category_id) == $category->id) selected
                 @endif>
                {{ $category->name }}</option>
            @endforeach
        </select>
    </dd>
    <dt>メーカー</dt>
    <dd><input type="text" name="maker"value=" {{ old('maker',$product->maker) }}"></dd>
    <dt>商品名</dt>
    <dd><input type="text" name="name"value=" {{ old('name',$product->name) }}"></dd>
    <dt>価格</dt>
    <dd><input type="text" name="price"value=" {{ old('price',$product->price) }}"></dd>
</dl>
