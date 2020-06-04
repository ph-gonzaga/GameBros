<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private function getOrdersUser(int $user_id){
        return Order::all()->where('user_id', $user_id);
    }

    private function getOrderProducts(int $id){
        return OrderProduct::all()->where('order_id', $id);
    }

    public function index()
    {
        $user = auth()->user();
        $orders = $this->getOrdersUser($user->id)->sortByDesc('created_at');
        #dd ($orders);
        return view('orders.index')->with('orders', $orders);
    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        
        $orderProducts = $this->getOrderProducts($order->id);
   
        #dd ($totalPrice);
        foreach($orderProducts as $product){
    
            $clientCatalog[] = Product::withTrashed()->find($product->product_id);
            
            $price[] = $product->price;

        }

        return view('orders.show')->with('products', $clientCatalog)->with('order_id', $order->id)->with('price', $price);
    }

    public function searchOrder(Request $request){
            $user = auth()->user();
            $query = $request->input('teste');
            $orders = Order::where('id', 'LIKE', "{$query}")->where('user_id', $user->id)->paginate(8);
            return view('orders.index')->with('orders', $orders);
        
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
