@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="mt-3 text-center" style="color:#e91e63; font-weight: bold;">Bem vindo(a) {{Auth::user()->name}} </h2>
                    <h3 class="mt-1 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;"><a href="{{ url('/') }}">Clique aqui</a> e conheça nossos produtos.</h3>
                    <div class="mt-2 col-12">
                        <div class="text-center">
                            <a href="#"><img src={{ asset('img/saudacao.gif') }}  width="500px" height="100%"></a>
                        </div>   
                    </div>
        </div>
    </div>
</div>
@endsection
