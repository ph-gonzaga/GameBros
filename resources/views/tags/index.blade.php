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
        <h2 class="text-uppercase">Lista de Tags</h2>
        <hr>
    </div>

    <div class="col-md-3 justify-content-end">
        <a class="col-12 btn btn-lg mb-2"  data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: #e91e63; color: white">Nova Tag</a>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title px-2" style="border-left: solid 12px #e91e63; color: #484848">Nova Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">

                    <div class="col-md-1 col-12 pt-md-4">
                      
                    </div>

                    <div class="col-md-7 col-12 pt-md-4">

                        <form action="{{route('tags.store')}}" class="bg-white p3" method="POST">
                        
                            @csrf
                            <div class="form-group text-center justify-content-center">
                            <input type="text" class="form-control campos text-center" name="name" value="{{old('name')}}" maxlength="18" required autocomplete="off"  placeholder="Digite o nome da tag" style="border: solid 2px #e91e63 !important;">
                            </div>
                            <div class="row text-center justify-content-center">
                            <button type="button" class="col-md-4 col-5 btn btn-secondary" data-dismiss="modal" style="border-radius: 40px">Cancelar</button>
                            <button type="submit" class="col-md-4 col-5 btn mx-1" style="background:#e91e63; border-radius: 40px; color: white">Salvar</button>
                            </div>
                        </form>


                    </div>

                    <div class="col-md-3 col-12 pt-md-4">
                        <div class="text-center">
                            <a href="#"><img src={{ asset('img/13.png') }}  width="170px" height="100%"></a>
                        </div>   
                    </div>

                </div>

                <div class="modal-footer"  style="background: #e91e63 !important;">
                      
                </div>

            </div>
        </div>
    </div>

</div>

<ul class="menu_lateral menu_tag list-group">
     @foreach($tags as $tag)
    <li class="list-group-item">
        <span>{{$tag->name}}</span>
        <span>({{$tag->products()->count()}})</span>
        
        @if(!$tag->trashed())

        <a href="{{ route('tags.edit', $tag->id)}}" class="acao btn btn_table_action btn_tag btn-sm float-right ml-1"><i class="fas fa-edit"></i>&nbsp;Editar</a>
       
        @else
        <form action="{{ route('restore-tags.update', $tag->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
            @csrf
            @method('PUT')
        <button type="submit" href="#" class="btn btn-primary btn_tag btn-sm float-right ml-1" style="border-radius: 40px"><i class="fas fa-plus-circle"></i>&nbsp;Reativar</button>
        </form>
        @endif
        <form action="{{ route('tags.destroy', $tag->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer apagar?')">
            @csrf
            @method('DELETE')
        <button type="submit" href="#" class="desativar btn_table_action btn_tag btn btn-sm float-right"><i class="fas fa-minus-circle"></i>&nbsp;{{ $tag->trashed()? 'Remover' : 'Inativar'}}</a>
        </form>

    </li>
    @endforeach
</ul>
@endsection
