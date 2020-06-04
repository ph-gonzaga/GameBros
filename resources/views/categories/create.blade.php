@extends('layouts.app')
@section('content')
<div class="row">
    <h2 class="col-md-9"> Nova Categoria </h2>
</div>
<form action="{{route('categories.store')}}" class="bg-white p3" method="POST">
    @if($errors->any())
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item"><div class="alert alert-danger" role="alert">{{$error}}</div></li>
        @endforeach
    </ul>
    @endif

    @csrf
    <div class="form-group">
    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Digite o nome da categoria">
    </div>
    <button type="submit" class="btn btn-success">Criar categoria</button>
</form>
@endsection
