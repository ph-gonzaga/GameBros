@extends('layouts.app')

@section('content')

<div class="mx-auto col-9 mb-4 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    <h2 class="text-uppercase">Meus pedidos</h2>
    <hr>
</div>

<section class="container py-2">
        @if (Auth::user()->orders->count() > 0)
            <div class="col-12 mb-4 d-flex justify-content-center">
                <form action="{{ route('search-order') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="col-9 form-control mr-lg-1 mr-0" name="teste" id="borda-input" type="search" value="{{request()->input('teste')}}" placeholder="N° Pedido">
                    <button class="col-lg-2 col-3 btn btn-outline-success" id="buscar" type="submit"><i
                        class="fas fa-search"></i></button>
                </form>
            </div>

            @if ($orders->count() > 0)
                <ul class="menu_lateral menu_categoria list-group">
                    @foreach($orders as $order)
                        <li class="list-group-item pb-2">
                            <span class="pt-2" style="color:#258d52; font-weight: bold;">Pedido #{{$order->id}}</span>
                            <span class="pt-2 pl-4 text-center">Data {{ date('d-m-Y', strtotime($order->created_at))}}</span>
                            <a href="{{ route('order-show', $order->id) }}" class="acao btn btn_table_action btn float-right ml-1"><i class="fas fa-eye"></i>&nbsp;Visualizar</a>               
                        </li>
                    @endforeach
                </ul>
            @else
            <h3 class="mt-3 text-center" style="color:#e91e63; font-weight: bold;">Ops! Não encontramos o seu pedido...</h3>
            <h5 class="mt-1 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;"><a href="{{ url('order') }}">Clique aqui</a> para ver todos os pedidos</h5>
            <div class="col-12">
                <div class="text-center">
                    <a href="#"><img src={{ asset('img/56.png') }}  width="500px" height="100%"></a>
                </div>   
            </div>
            @endif

       @else
        <h3 class="mt-3 text-center" style="color:#e91e63; font-weight: bold;">Ops! nenhum pedido encontrado...</h3>
        <h5 class="mt-1 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">Ou <a href="{{ url('/') }}">Clique aqui</a> para continuar comprando.</h5>
        <div class="col-12">
            <div class="text-center">
                <a href="#"><img src={{ asset('img/56.png') }}  width="500px" height="100%"></a>
            </div>   
        </div>
       @endif
</section>

@endsection