@extends('layouts.app')
@section('content')
<div class="row"> 

    <div class="mx-auto col-10 text-center">
    
        @if($errors->any())
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item"><div class="alert alert-danger" role="alert">{{$error}}</div></li>
                @endforeach
            </ul>
        @endif

    </div>

    <div class="mx-auto mb-4 col-10 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
        <h2 class="text-uppercase">Editar Categoria</h2>
        <hr>
     </div>

</div>
<div class="row">
    <div class="col-md-7 col-12">

        <form action="{{route('categories.update', $category->id)}}" class="bg-white p3" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
            <input type="text" class="form-control text-center" name="name" value="{{$category->name}}" placeholder="Digite o nome da categoria" maxlength="18" required autocomplete="off" style="border: solid 2px #36ae69 !important; border-radius: 40px;">
            </div>
            <button type="submit" class="col-md-4 col-12 btn btn-success float-right" style="border-radius: 40px;">Salvar</button>
        </form>

    </div>

    <div class="col-md-4 col-12">
        <div class="text-center">
            <a href="#"><img src={{ asset('img/2.png') }}  width="100%" height="100%"></a>
        </div>   
    </div>
</div>
@endsection