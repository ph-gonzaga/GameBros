@extends('layouts.app')
@section('content')

<div class="mx-auto col-9 mb-4 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    <h2 class="text-uppercase">Editar Perfil</h2>
    <hr>
</div>


<div class="row">
    <div class="col-md-7 col-12">

        <form action="{{ route('users.update-profile', $user->id) }}" class="bg-white p-3" method="POST">
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
                <label for="name" style="font-size: medium; font-weight: bold; color:rgba(0, 0, 0, 0.5);">Nome</label>
                <input type="text" class="form-control campos" name="name" placeholder="Digite seu nome" value="{{ $user->name }}" required autocomplete="off" maxlength="35" style="border: 2px solid #3490dc !important;" >
            </div>
            <div class="form-group">
                <label for="name" style="font-size: medium; font-weight: bold; color:rgba(0, 0, 0, 0.5);">E-mail</label>
                <input type="text" class="form-control campos" name="email" placeholder="Digite seu e-mail" value="{{ $user->email }}" required autocomplete="off" style="border: 2px solid #3490dc !important;" >
            </div>
            <div class="form-group">
                <label for="name" style="font-size: medium; font-weight: bold; color:rgba(0, 0, 0, 0.5);">Senha</label>
                <input type="password"  placeholder="Informe sua senha" title="Sua senha deve possuir entre 8 (seis) e 18 (dezoitos) digitos." minlength="8" maxlength="18" class="form-control campos" name="password" placeholder="Digite sua senha" required autocomplete="off" style="border: 2px solid #3490dc !important;">
            </div>
            <button type="submit" class="col-md-4 btn-primary btn float-left" style="border-radius: 40px;">Salvar</button>
        </form>
        
    </div>

    <div class="col-md-4 col-12 mt-4">
        <div class="text-center">
            <a href="#"><img src={{ asset('img/5.png') }}  width="100%" height="100%"></a>
        </div>   
    </div>
</div>
@endsection