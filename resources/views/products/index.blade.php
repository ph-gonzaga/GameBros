@extends('layouts.app')
@section('content')
<div class="row">
    <div class="mx-auto mb-2 col-10 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
      <h2 class="text-uppercase">Lista de Produtos</h2>
      <hr>
   </div>
</div>

<div class="row">
  

  <div class="col-lg-3 col-6 text-center">

    <div class="dropdown show">
      <a class="col-12 btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categorias
      </a>
    
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach(\App\Category::all() as $category)
        <a class="dropdown-item" href="{{ route('search-products-category', $category->id) }}">{{$category->name}}</a>
        @endforeach
      </div>
    </div>

  </div>

  <div class="col-lg-3 col-6 text-center">

    <div class="dropdown show">
      <a class="col-12 btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Tags
      </a>
    
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach(\App\Tag::all() as $tag)
        <a class="dropdown-item" href="{{ route('search-products-tag', $tag->id) }}">{{$tag->name}}</a>
        @endforeach
      </div>
    </div>
    
  </div>

<div class="col-lg-6 col-12 mb-4">
    <form action="{{ route('search-products') }}" method="GET" class="form-inline my-2 my-lg-0">
        <input class="col-9 form-control mr-lg-1 mr-0" name="busca-produto" id="borda-input" type="search" value="{{request()->input('busca-produto')}}" placeholder="Pesquisar Produto" aria-label="Search">
        <button class="col-lg-2 col-3 btn btn-outline-success" id="buscar" type="submit"><i
            class="fas fa-search"></i></button>
    </form>
  </div>

</div>

<div class="col-6 collapse navbar-collapse" id="navbarSupportedContent">
  <!-- Left Side Of Navbar -->
  <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarCategoria" role="button" data-toggle="dropdown">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="navbarCategoria">
              @foreach(\App\Category::all() as $category)
              <a class="dropdown-item" href="{{ route('search-category', $category->id) }}">{{$category->name}}</a>
              @endforeach
          </div>
      </li>
  </ul>
</div>

<div class="row">
    @foreach($products as $product)

      <div class="card mx-lg-0 mx-auto col-sm-10 col-lg-3 mb-4 img-fluid text-center" style="width: 18rem; border: 0px solid #484848">
        <a href="{{ route('show-product', $product->id) }}"><img class="card-img-top img-fluid"  src="{{ asset('storage/'.$product->image) }}" alt="Card image cap" style="width: 100px; heigth:100%;"></a>
          <div class="card-body m-0 py-1">
            <h5 class="card-title d-block h6 text-center mt-2" style="font-weight: bold;">{{ $product->name }}</h5>
              <div class="text-center">
              

              </div>
          </div>
          <div class="card-footer" style="background: white !important">
           
            @if(!$product->trashed())

                  <a class="acao btn col-12 my-1" href="{{ route('products.edit', $product->id)}}"
                                      role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>
               
                @else
                <form action="{{ route('restore-products.update', $product->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
                    @csrf
                    @method('PUT')
                <button type="submit" href="#" class="acao btn col-12 my-1"><i class="fas fa-plus-circle"></i>&nbsp;Reativar</button>
                </form>
                @endif
                <form action="{{ route('products.destroy', $product->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer inativar e/ou remover?')">
                    @csrf
                    @method('DELETE')
                <button type="submit" href="#" class="desativar btn col-12 my-1"><i class="fas fa-minus-circle"></i>&nbsp;{{ $product->trashed()? 'Remover' : 'Inativar'}}</a>
                </form>
                
          </div>
      </div>
    @endforeach
</div>


@endsection
