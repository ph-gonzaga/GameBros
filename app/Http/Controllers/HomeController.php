<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show(){
        return view('welcome')->with('products', Product::all()->sortByDesc('price')->take(3));
    }

    public function searchCategory(Category $category){
        
        return view('store.search')->with('products', $category->products()->paginate(10))->with('title', $category->name);
    }

    public function searchTag(Tag $tag){
        return view('store.search')->with('products', $tag->products()->paginate(1))->with('title', $tag->name);
    }

    public function search(Request $request){
        $query = $request->input('query');
        $product = Product::where('name', 'LIKE', "%{$query}%")->paginate(6);
        return view('store.search')->with('products', $product)->with('title', "Resultado da Pesquisa");
    }

    public function showProduct(Product $product){
        return view('store.product')->with('product',$product);
    }
}
