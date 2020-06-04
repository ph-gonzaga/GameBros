@extends('layouts.app')
@section('javascript')
    <script>
        window.onload = function() {
            $('.select2').select2();
        };
    </script>
@endsection
@section('content')
<div class="mx-auto mb-2 col-10 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    <h2 class="text-uppercase">Editar Produto</h2>
    <hr>
</div>
<form id="form-products" action="{{ route('products.update', $product->id) }}" class="bg-white p-3" method="POST" enctype="multipart/form-data">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" class="create-products form-control" name="name" placeholder="Digite o nome do produto"  maxlength="50" autocomplete="off" value="{{$product->name}}" required>
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea class="create-products form-control" name="description" placeholder="Digite a descrição do produto" autocomplete="off" required>{{$product->description}}</textarea>
    </div>

    <div class="row">
        <div class="col-6 form-group">
            <label for="category">Categoria:</label>
            <select name="category_id" class="create-products form-control" required>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>
                    {{$category->name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="type">Sub Categoria:</label>
                <input class="create-products form-control" name="type" value="{{$product->type}}" disabled>
        </div>

    </div> 
    
    <div class="form-group">
        <label for="tags">Tags:</label>
        <select name="tags[]" class="form-control select2" multiple>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" {{ $product->hasTag($tag->id) ? 'selected' : '' }}>
                {{$tag->name}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-6 form-group">
            <label for="price">Preço:</label>
            <input type="number" class="create-products form-control" name="price" value="{{$product->price}}" min='1' max='5000' required>
        </div>
        
        <div class="col-6 form-group">
            <label for="discount">Desconto %:</label>
            <input type="number" class="create-products form-control" name="discount" value="{{$product->discount}}"  min='0' max='50' required>
        </div>
    </div>

    <div class="row">

        <div class="col-6 form-group">
            <label for="stock">Número de produtos em estoque:</label>
            <input type="number" class="create-products form-control" name="stock" min='0' max='500' value="{{$product->stock}}" required>
        </div>

        <div class="col-6 form-group">
            <label for="warranty">Garantia:</label>
            <select name="warranty" class="create-products form-control">
                    <option selected>{{$product->warranty}}</option>
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
        <input type="file" id="file-upload" name="image">
    </div>

    <div class="form-group text-center">
    <a href="{{ url('/') }}" class="btn_table_action col-3 btn btn-success mt-3">Cancelar</a>
    <button type="submit" class="acao col-3 btn btn-success mt-3">Salvar</button>
    </div>

</form>
@endsection