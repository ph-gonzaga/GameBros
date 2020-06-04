@extends('layouts.app')
@section('content')
<div class="col-12 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    @if($errors->any())
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item"><div class="alert" role="alert">{{$error}}</div></li>
        @endforeach
    </ul>
    @endif
</div>
<div class="mx-auto col-9 mb-4 text-center" style="color: rgba(0, 0, 0, 0.5); font-weight: bold;">
    <h2 class="text-uppercase">Lista de Usuários</h2>
    <hr>
</div>

<ul class="menu_lateral list-group">
    @foreach($users as $user)
        @if($user->id != auth()->user()->id)
            <li class="list-group-item">
                <span>{{$user->name}}</span>
                <span>({{$user->email}})</span>
                <form action="{{ route('users.change-admin', $user->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza que quer atualizar o Admin?')">
                    @csrf
                    @method('PUT')
                    <button type="submit" href="#" class="btn btn-sm float-right ml-1 {{ $user->isAdmin() ? 'btn-danger col-2' : 'btn-primary col-2'}}" style="border-radius: 40px">
                        {{$user->isAdmin() ? 'Remover Admin' : 'Adicionar Admin'}}
                    </button>
                </form>
            </li>
        @endif
    @endforeach
</ul>
@endsection