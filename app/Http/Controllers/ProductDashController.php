<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // 値取得
        $category_id = $request->input('category_id');
        // $category_id = $request->input('category_id');
        $keyword = $request->input('keyword');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $sort = $request->sort;
        switch ($sort) {
            case '1':
                //「指定なし」はID順
                $sort1 = "id";
                $sort2 = "asc";
                break;
            case '2':
                // 「価格が低い順」でソート
                $sort1 =  "price";
                $sort2 = "asc";
                break;
            case '3':
                // 「価格が高い順」でソート
                $sort1 = "price";
                $sort2 = "desc";
                break;
            default :
                // デフォルトはID順
                $sort1 = "id";
                $sort2 = "asc";
                break;
        }

        $query = Product::query();
        if (isset($category_id)){
            $query->where('category_id',"$category_id");}
        if (isset($keyword)){$query->where(function ($q) use($keyword) {
            $q->where('name', 'LIKE', "%$keyword%");
            $q->orWhere('maker', 'LIKE', "%$keyword%");
        });}
        if (isset($min_price)){$query->where('price','>=',"$min_price");}
        if (isset($max_price)){$query->where('price','<=',"$max_price");}


        $products = $query->orderBy($sort1,$sort2)->paginate(20);
        $data = [
            "products" => $products,
        ];
        return view("products.index", $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $data = ['product' => $product];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'maker' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = ['product' => $product];
        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = ['product' => $product];
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'maker' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);
        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();
        return redirect(route('products.show', $product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('home'));
    }
}
