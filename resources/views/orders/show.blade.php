@extends('layouts.app')

@section('content')
<div class="mx-auto col-9 mb-4 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    <h2 class="text-uppercase">Pedido {{ $order_id }}</h2>
    <h4 class="text-uppercase"> ITENS COMPRADOS</h4>
    <hr>
</div>
<section class="container py-2">

        <table class="table text-center text-uppercase" style="border-top: 2px solid #ffffff !important;">

            <thead style="background: #f4f4f4;">
                <tr style="font-size: 14px; font-weight: bold; color: rgba(0, 0, 0, 0.5);">
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>

            <tbody>
                @php
                $total_pedido = 0;
                @endphp
                @for ($i = 0; $i < count($products); $i++) 
                    <tr class="center">
                        <td scope="row"><img src="{{ asset('storage/' .$products[$i]->image) }}" alt="{{ $products[$i]->name }}" style="width: 60px; heigth:100%;"></td>
                        <td scope="row">{{$products[$i]->name}}</td>
                        <td scope="row">1</td>
                        <td scope="row">R${{$price[$i]}}</td>
                    </tr>
                    @php
                    $total_pedido += $price[$i];
                    @endphp
                @endfor
            </tbody>
        </table>

    
            <div class="col-12 my-1">
              
                <div class="text-md-right py-2 pr-md-4" style="background-color: #3490dc;">

                        <span style="font-size: 18px; font-weight: bold; color: white">Total R$ {{ number_format($total_pedido,2) }}</span>
                </div>
            </div>

</section>

@endsection