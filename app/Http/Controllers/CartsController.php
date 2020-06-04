<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;

        //se o usuario não tiver carrinho, cria um carrinho vazio
        if($cart == null){
            $cart = Cart::updateOrCreate(['user_id' => $user->id]);
        }
        
        return view('carts.index')->with('products', $cart->products);
       
    }

    public function store(Product $product)
    {
       
        $user = auth()->user();
        $cart = Cart::updateOrCreate(['user_id' => $user->id]);

        //Dado produto no carrinho 
        //Então mensagem de alerta
        if($cart->products()->where('product_id', $product->id)->count()){
            session()->flash('error', 'O produto ('.$product->name.') já está no carrinho, não pode ser adicionado novamente.');
        }else{
            $cart->products()->saveMany([$product]);
            session()->flash('success', 'O produto ('.$product->name.') foi adicionado no carrinho.'); 
        }
        return redirect()->back();
    }

    public function destroy(Product $product)
    {

        $user = auth()->user();
        $cart = $user->cart;

        DB::table('cart_product')->where([['cart_id', $cart->id],['product_id',$product->id]])->delete();
        session()->flash('success', 'O produto ('.$product->name.') foi removido do carrinho.');
        return redirect()->back();
    }


    public function checkout(){
        
        $user = auth()->user();
        $cart = $user->cart;

        $orderItens = DB::table('cart_product')->where('cart_id', $cart->id)->get();

        // Cria um pedido para o usuario
        $order = Order::create(['user_id' => $user->id]);
        #dd ($order->id);

        foreach($orderItens as $item){ 
            $prod = Product::find($item->product_id);
            // Vincular os itens dentro da tabela de Order Product e cria o registro
            OrderProduct::create(['order_id' => $order->id,'product_id' => $item->product_id,'price' => $prod->sub_total()]);

             $stock = $prod->stock;
             $stock -= 1;
 
             $prod->update(['stock' => $stock]);

        } 
        
        //Limpa o carrinho
        $clearCart = Cart::all()->where('user_id', $user->id);

        foreach ($clearCart as $prodCart)
        {
            $prodCart->delete();
        }

        session()->flash('success', 'Pedido finalizado com sucesso!');
        return redirect(route('orders.index'));
    }

    public function destroyCart(){
          
        $user = auth()->user();

          //Limpa o carrinho
          $clearCart = Cart::all()->where('user_id', $user->id);

          foreach ($clearCart as $prodCart)
          {
              $prodCart->delete();
          }

       
        return redirect()->back();
    }

}
