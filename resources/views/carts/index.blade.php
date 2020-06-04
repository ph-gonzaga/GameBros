@extends('layouts.store')
@section('content')
<div class="col-12 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    @if($errors->any())
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item"><div class="alert alert-danger" role="alert">{{$error}}</div></li>
        @endforeach
    </ul>
    @endif
</div>
<h2 class="modal-title p-2 text-uppercase text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">Meu Carrinho</h2>
<section class="container py-4">
    @if (Auth::user()->cart != null)
        @if (Auth::user()->cart->products()->count() > 0)

            <table class="table text-center  text-uppercase " style="border-top: 2px solid #ffffff !important;">
                <thead style="background: #f4f4f4;">
                    <tr style="font-size: 18px; font-weight: bold; color: rgba(0, 0, 0, 0.5);">
                        <th></th>
                        <th>Item</th>
                        <th>Preço</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    @php
                        $total_produto = 0;
                        $total_pedido = 0;
                    @endphp
                    @foreach($products as $product)
                    <tr>
                        <td> <a href="{{ route('show-product', $product->id) }}"><img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" style="width: 80px; heigth:100%;"></a></td>
                        <td class="pt-4" style="font-size: 18px;">{{ $product->name }}</td>
                        <td class="pt-4" style="font-size: 18px; font-weight: bold;">{{ $product->discountPrice() }}</td>
                        <td class="pt-4"><a href="{{ route('cart-remove', $product->id) }}" class="px-4 py-1 desativar btn btn-sm"><i class="fas fa-trash"></i></a></td> 
                        @php
                        $total_produto = $product->sub_total();
                        $total_pedido += $total_produto;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>


           

            <div class="row">

                <div class="col-md-9 my-1">
                    <hr>
                </div>

                <div class="col-md-3 col-12 my-1">
                    <a href="{{ route('cart-remove-all') }}" class="col-12 btn_table_action btn btn-sm" style="border-radius:40px;">Limpar Carrinho</a>
                </div>

            </div>


            <div class="form-group row">

                <div class="col-md-9 my-1">

                    <div class="text-md-right py-2 pr-md-4" style="background-color: #3490dc;">
                            <label class="pl-4" style="font-size: 18px; font-weight: bold; color: white">Total</label>
                            <span style="font-size: 18px; font-weight: bold; color: white">R${{ number_format($total_pedido,2) }}</span>
                    </div>
                </div>

                <div class="col-md-3 col-12 my-1">
                    <form action="{{ route('cart-checkout') }}" method="POST">
                        @csrf
                        <button type="submit" id="btn_comprar" class="col-12 btn btn-primary btn-lg" style="border-radius:40px;">Fechar pedido</button>
                    </form>
                </div>

            </div>

        @else
            <h4 class="mt-3 text-center" style="color:#e91e63; font-weight: bold;">Nenhum item está em seu carrinho de compras.</h4>
            <h5 class="mt-1 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;"><a href="{{ url('/') }}">Clique aqui</a> para continuar comprando.</h5>
            <div class="mt-2 col-12">
                <div class="text-center">
                    <a href="#"><img src={{ asset('img/445.png') }}  width="500px" height="100%"></a>
                </div>   
            </div>
        @endif

    @else
        <h4 class="mt-3 text-center" style="color:#e91e63; font-weight: bold;">Nenhum item está em seu carrinho de compras.</h4>
        <h5 class="mt-1 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;"><a href="{{ url('/') }}">Clique aqui</a> para continuar comprando.</h5>
        <div class="mt-2 col-12">
            <div class="text-center">
                <a href="#"><img src={{ asset('img/445.png') }}  width="500px" height="100%"></a>
            </div>   
        </div>
    @endif
</section>
@endsection