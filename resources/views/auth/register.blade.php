@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border: white">
              

                <div class="row  card-body">

                    <div class="col-md-8 col-12 text-center">

                        <h3 class="modal-title p-2" style="border-left: solid 12px #02b6df; color: #484848">CRIE SUA CONTA</h3><hr>

                        <h5 class="modal-title my-4 text-center" style="color: #170085;">Criar uma conta é simples e rápido!</h5>


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row py-1">
                                <label for="name" class="col-md-4 col-form-label text-md-right label_form">*Nome</label>

                                <div class="col-md-8 col-12">
                                    <input id="name" placeholder="Informe seu nome" type="text" class="form-control input_cadastro text-center @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" maxlength="35" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-1">
                                <label for="email" class="col-md-4 col-form-label text-md-right label_form">*E-mail</label>

                                <div class="col-md-8">
                                    <input id="email"  placeholder="Informe seu e-mail"  type="email" class="form-control input_cadastro text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" maxlength="100">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-1">
                                <label for="password" class="col-md-4 col-form-label text-md-right label_form">*Senha</label>

                                <div class="col-md-8">
                                    <input id="password"  placeholder="Informe sua senha" title="Sua senha deve possuir entre 8 (seis) e 18 (dezoitos) digitos." minlength="8" maxlength="18"  type="password" class="form-control input_cadastro text-center @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-1">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right label_form">*Confirmar Senha</label>

                                <div class="col-md-8">
                                    <input id="password-confirm"  title="Sua senha deve ser igual a senha informada no campo anterior."  placeholder="Confirme sua senha"  type="password" class="form-control input_cadastro text-center" name="password_confirmation" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-9 my-1" >
                                  
                                    <div class="form-check text-md-right pb-4 pt-3 pr-md-4" style="background-color: #02b6df">
                                        
                                        
                               
                                
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 my-1">
                                    <button type="submit" id="btn_cadastro" class="col-12 btn btn-primary">
                                       Cadastrar
                                    </button>
                                </div>

                            </div>

                            <p class="text-md-left" ><strong
                                style="font-size:0.85em; color:rgba(0, 0, 0, 0.5); ">* Campos de preenchimento
                                obrigatório.</strong></p>

                        </form>
                    </div>

                    <div class="col-md-4 col-12 pt-md-4">
                        <div class="text-center">
                            <a href="#"><img src={{ asset('img/sonic.png') }}  width="100%" height="100%" alt="pokemon"></a>
                        </div>   
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
