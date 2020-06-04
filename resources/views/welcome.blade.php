@extends('layouts.store')
@section('css')
<style>
    .banner {
        min-height: 400px;
        background: url('http://via.placeholder.com/2000x800');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
@endsection
@section('content')


<section class="container py-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
                <a href="#"><img class="d-block w-100" id="intro" src="{{ asset('img/slide_1.png') }}" width="100%" height="100%" alt="Pokemon"></a>
                <div class="carousel-caption d-none d-md-block text-center titulo_banner" style="background-color:rgba(0, 0, 0, 0.7) !important; ">
                    <h4>Pokemon Sword & Shield</h4>
                    <p>Forje um caminho e lute para se tornar o próximo campeão da região de Galar!</p>
                </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/slide_2.png') }}" width="100%" height="100%" alt="Mario">
            <div class="carousel-caption d-none d-md-block text-center titulo_banner" style="background-color:rgba(0, 0, 0, 0.7) !important;">
                <h4>Báu do Mario</h4>
                <p>Encontre os melhores jogos da franquia do Mario Bros</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/slide_3.png') }}" width="100%" height="100%" alt="The Witcher">
            <div class="carousel-caption d-none d-md-block text-center titulo_banner" style="background-color:rgba(0, 0, 0, 0.7) !important;">
                <h4>The Witch 3 - Wild Hunt</h4>
                <p>Uma épica fantasia obscura e um mundo inteiro para explorar.</p>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only" >Próximo</span>
        </a>
      </div>
</section>



<section class="container py-2" style="background-color: white !important;">


    <div class="row">
        <div class="mx-auto col-6 mb-4 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
            <h2 class="text-uppercase">Produtos em destaque</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        @foreach($products as $product)
          <div class="card mx-auto col-sm-10 col-md-6 col-lg-3 mb-4 img-fluid" id="produto" style="width: 18rem; border: 0px solid #484848">
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
                  <a href="#" class="fora_estoque col-12 btn btn-danger">Indisponivel</a>
                @endif
              </div>

          </div>
        @endforeach
    </div>
</section>


@endsection
