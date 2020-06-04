@extends('layouts.store')
@section('content')

<section class="container py-4">
    <div class="row">
        <div class="mx-auto mb-4 col-10 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
          <h2 class="text-uppercase">{{ $title }}</h2>
            <h4 class="text-uppercase">{{ $products->total() }} resultado(s)</h4>
            <hr>
        </div>
    </div>

    @if ($products->total() > 0)
      <div class="row">
          @foreach($products as $product)
    
            <div class="card mx-auto col-sm-10 col-md-3 col-lg-2 mb-4 img-fluid" style="width: 18rem; border: 0px solid #484848">
              <a href="{{ route('show-product', $product->id) }}"><img class="card-img-top img-fluid"  src="{{ asset('storage/'.$product->image) }}" alt="Card image cap"></a>
                <div class="card-body m-0 py-1">
                  <h5 class="card-title d-block h6 text-center mt-2" style="font-weight: bold;">{{ $product->name }}</h5>
                    <div class="text-center">
                      <span class="text-muted old-price">{{$product->price()}}</span><br>
                      <span style="font-size: 22px; font-weight: bold; color:#00b1ff">{{ $product->discountPrice() }}</span>
                    </div>
                </div>
                <div class="card-footer" style="background: white !important">
                  @if($product->stock > 0)
                  <a href="{{ route('cart-store', $product->id)}}" id="btn_comprar" class="col-12 btn btn-secondary">Comprar</a>
                  @else
                  <div class="text-left mt-3">
                  <a href="#" class="fora_estoque col-12 btn btn-danger">Indisponivel</a>
                  </div>
                  @endif
                </div>
            </div>
          @endforeach
      </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
    @else
    <h3 class="mt-3 text-center" style="color:#e91e63; font-weight: bold;">Ops! nenhum resultado encontrado...</h3>
    <h4 class="mt-2 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">O que eu faço?</h4>
    <h5 class="mt-1 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">Verifique os termos digitados ou os filtros selecionados.<br>
      Utilize termos genéricos na busca.</h5>
    <div class="col-12">
        <div class="text-center">
            <a href="#"><img src={{ asset('img/11.png') }}  width="500px" height="100%"></a>
        </div>   
    </div>
    @endif
</section>
@endsection