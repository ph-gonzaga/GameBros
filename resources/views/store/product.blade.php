@extends('layouts.store')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">Se deseja finalizar a compra <a href='{{ route('cart')}}'>Clique Aqui</a></div>
@endif
<section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/') }}">Home</a> / <a href="{{ route('search-category', $product->category->id) }}">{{$product->category->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->type }} / {{$product->name}}</li>
        </ol>
      </nav>
</section>
<section class="container py-4">
    <div class="row">
        <div class="col-md-5 col-12 text-center pb-3">
            <div class="col-12">
                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" width="300px" height="300px">
            </div>
            
        </div>

        <div class="card col-12 col-md-7 text-left"  style="border-radius: 20px; border: 1px solid white">
            <h2 class="text-uppercase mt-3" style="color: #02b6df; font-size: 28px; font-weight: bold;">{{ $product->type }}</h2>
            <h2 class="text-uppercase mt-3" style="color: #707070; font-size: 36px; font-weight: bold;">{{ $product->name }}</h2>
            <div class="text-left">
                <span class="text-muted old-price" style="color: #707070; font-size: 20px;">{{$product->price()}}</span><br>
                <span style="color: #3490dc; font-size: 32px; font-weight: bold;">{{ $product->discountPrice() }}</span>
            </div>
            @if($product->stock > 0)
            <div class="text-left mt-3">
                <a href="{{ route('cart-store', $product->id)}}" id="compra_product" class="btn px-2 btn-primary"><i class="fas fa-shopping-cart px-2"></i>Adicionar ao carrinho</a>
            </div>
            @else
            <div class="text-left mt-3">
                <a href="#" id="compra_product" class="btn px-2 btn-primary"><i class="fas fa-shopping-cart px-2"></i>Produto Indisponivel</a>
            </div>
            @endif
            <hr>
            <h3  class="text-uppercase" style="color: #707070;">Sobre</h3>
            <p class="text-justify" style="color: #707070; font-size: 16px;">{{ $product->description }}</p>
            <div class="text-left mt-2">
                <h3  class="text-uppercase" style="color: #707070;">Tags</h3>
                @foreach($product->tags as $tag)
                    <a class="acao btn btn-lg btn-secondary mt-1" href="{{ route('search-tag', $tag->id) }}">{{$tag->name}}</a>
                @endforeach
            </div>

            <div class="text-left mt-2">
                <h3  class="text-uppercase" style="color: #707070;">Garantia</h3>
                <p style="color: #707070; font-size: 18px;">{{ $product->warranty }}</p>
            </div>
        </div>

    </div>


</section>
@endsection