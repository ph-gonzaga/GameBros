<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Tag;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        //Executa essa validação apenas para as funções para criar um produto e salvar no banco
        $this->middleware('VerifyCategoriesCount')->only(['create', 'store']);
    }

    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create')->with('categories', Category::all())->with('tags', Tag::all());
    }


    public function store(CreateProductRequest $request)
    {
        //Cria a imagem
        
        $image = $request->image->store('products');
        $product = Product::create($request->all());
        
        //Atualiza o endereço da imagem no banco
        $product->image = $image;
        $product->save();

         //salva os dados das tags
         if($request->tags){
            $product->tags()->attach($request->tags);
        }

         session()->flash('success', 'Produto criado com sucesso!');
 
         // Redirecionar para tela de lista de categorias
         return redirect(route('products.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product)->with('categories', Category::all())->with('tags', Tag::all());
    }


    public function update(EditProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'warranty' => $request->warranty,
        ]);

        $product->tags()->sync($request->tags);

        if($request->image){
            //apaga imagem anterior
            Storage::delete($product->image);

            //cria a imagem;
            $image = $request->image->store('products');

            //atualiza o endereço da imagem no banco
            $product->image = $image;
            $product->save();
        }

        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('products.index'));
    }

  
    public function destroy($id)
    {
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();

        if($product->trashed()){
            Storage::delete($product->image);
            $product->forceDelete();
            session()->flash('success', 'Produto removido com sucesso!');
        }else{
            $product->delete();
            session()->flash('success', 'Produto movido para lixeira com sucesso!');
        }
        return redirect()->back();
    }

    public function trashed(){
        return view('products.index')->with('products', Product::onlyTrashed()->get());
    }

    public function restore($id){
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();
        $product->restore();
        session()->flash('success', 'Produto restaurado com sucesso!');
        return redirect()->back();
    }

    public function search(Request $request){
        $query = $request->input('busca-produto');
        $product = Product::where('name', 'LIKE', "%{$query}%")->paginate(8);
        return view('products.index')->with('products', $product);
    }

    public function searchCategory(Category $category){
        
        return view('products.index')->with('products', $category->products()->paginate(10))->with('title', $category->name);
    }

    public function searchTag(Tag $tag){
        return view('products.index')->with('products', $tag->products()->paginate(1))->with('title', $tag->name);
    }

}
