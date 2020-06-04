@extends('layouts.app')
@section('javascript')
    <script src='public/js/autosize.js'></script>

    <script>
        autosize(document.querySelectorAll('textarea'));
    </script>

    <script>
        window.onload = function() {
            $('.select2').select2();
        };
    </script>

@endsection
@section('content')
<div class="row">
    <div class="mx-auto mb-2 col-10 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2 class="text-uppercase">Cadastrar novo Produto</h2>
        <hr>
    </div>
</div>


<form id="form-products" action="{{ route('products.store') }}" class="bg-white p-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" data-ls-module="charCounter" class="create-products form-control" name="name" placeholder="Digite o nome do produto" maxlength="50" autocomplete="off" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea class="create-products form-control" name="description" placeholder="Digite a descrição do produto" autocomplete="off" required >{{ old('description') }}</textarea>
    </div>

    <div class="row">
        <div class="col-6 form-group">
            <label for="category_id">Categoria:</label>
            <select name="category_id" class="create-products form-control" required>
                <option value="" disabled selected>Selecione</option>
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option> 
                @endforeach
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="type">Sub Categoria:</label>
            <select name="type" class="create-products form-control" required>
                <option value="" disabled selected>Selecione</option>
                <option>Acessórios</option>
                <option>Console</option> 
                <option>Jogos</option> 
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="tags">Tags:</label>
        <select name="tags[]" class="form-control select2" placeholder="Selecione as tags" multiple>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-6 form-group">
            <label for="price">Preço:</label>
        <input type="number" class="create-products form-control" name="price"  value="{{ old('price') }}" min='1' max='50000' required>
        </div>

        <div class="col-6 form-group">
            <label for="discount">Desconto %:</label>
            <input type="number" class="create-products form-control" name="discount" value="{{ old('discount') }}"  min='0' max='50' required>
        </div>
    </div>

    <div class="row">

        <div class="col-6 form-group">
            <label for="stock">Número de produtos em estoque:</label>
            <input type="number" class="create-products form-control" name="stock" min='1' max='500' required value="{{ old('stock') }}">
        </div>

        <div class="col-6 form-group">
            <label for="warranty">Garantia:</label>
            <select name="warranty" class="create-products form-control" required>
                <option value="" disabled selected>Selecione</option>
                <option>30 dias</option>
                <option>60 dias</option> 
                <option>90 dias</option>
                <option>12 meses</option> 
                <option>24 meses</option> 
            </select>
        </div>
    </div>

    <div class="form-group text-center">
        <label for="file-upload" class="custom-file-upload">
            <img src="{{asset('img/mario.gif')}}" alt="foto produto"
                style="width:130px; height:130px;">
        </label><br>
        <label  style="font-size:0.85em; color:rgba(0, 0, 0, 0.5);"><strong>Clique no Mario para Upload de Imagem</strong></label><br>
        <input type="file" id="file-upload" name="image" required>
    </div>
    <div class="form-group text-center">
    <a href="{{ url('/') }}" class="btn_table_action col-3 btn btn-success mt-3">Cancelar</a>
    <button type="submit" class="acao col-3 btn btn-success mt-3">Salvar</button>
    </div>
</form>

@endsection