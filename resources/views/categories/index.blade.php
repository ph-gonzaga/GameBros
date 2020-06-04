@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
        @if($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item"><div class="alert alert-danger" role="alert">{{$error}}</div></li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="mx-auto col-9 mb-4 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
        <h2 class="text-uppercase">Lista de Categorias</h2>
        <hr>
    </div>
   
    <div class="col-lg-3 justify-content-end">
        <button type="button" class="col-12 btn btn-success btn-lg mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">Nova Categoria</button>
    </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title px-2" style="border-left: solid 12px #36ae69; color: #484848">Nova Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">

                        <div class="col-md-1 col-12 pt-md-4">
                          
                        </div>

                        <div class="col-md-7 col-12 pt-md-4">

                            <form action="{{route('categories.store')}}" class="bg-white p3" method="POST">
                                @csrf
                                <div class="form-group text-center justify-content-center">
                                <input type="text" class="form-control campos" name="name" value="{{old('name')}}" maxlength="18" required autocomplete="off" placeholder="Digite o nome da categoria" style="border: solid 2px #36ae69 !important;">
                                </div>
                                <div class="row text-center justify-content-center">
                                <button type="button" class="col-md-4 col-5 btn btn-secondary" data-dismiss="modal" style="border-radius: 40px">Cancelar</button>
                                <button type="submit" class="col-md-4 col-5 btn btn-success mx-1" style="border-radius: 40px;">Salvar</button>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-3 col-12 pt-md-4">
                            <div class="text-center">
                                <a href="#"><img src={{ asset('img/22.png') }}  width="170px" height="100%"></a>
                            </div>   
                        </div>

                    </div>

                    <div class="modal-footer"  style="background: #36ae69 !important;">
                      
                    </div>

                </div>
            </div>
        </div>

</div>

<ul class="menu_lateral menu_categoria list-group">
     @foreach($categories as $category)
    <li class="list-group-item pb-2">
        <span>{{$category->name}}</span>
        <span>({{$category->products()->count()}})</span>
        @if(!$category->trashed())

        <a href="{{ route('categories.edit', $category->id)}}" class="acao btn btn_table_action btn_categoria btn-sm float-right ml-1"><i class="fas fa-edit"></i>&nbsp;Editar</a>
        
        @else
        <form action="{{ route('restore-categories.update', $category->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
            @csrf
            @method('PUT')
        <button type="submit" href="#" class="btn btn_categoria btn-primary btn-sm float-right ml-1" style="border-radius: 40px"><i class="fas fa-plus-circle"></i>&nbsp;Reativar</button>
        </form>
        @endif

        <form action="{{ route('categories.destroy', $category->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Voce tem certeza que quer apagar?')">
            @csrf
            @method('DELETE')
            <button type="submit" href="#" class="desativar btn btn_table_action btn_categoria btn-sm float-right"><i class="fas fa-minus-circle"></i>&nbsp;Apagar</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
