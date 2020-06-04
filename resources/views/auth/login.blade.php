@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border: white">

                <div class="row card-body">

                    <div class="col-md-8 col-12 text-center">

                        <h3 class="modal-title p-2" style="border-left: solid 12px #f4d03b; color: #484848">ACESSE SUA CONTA</h3><hr>

                        <h5 class="modal-title my-4 text-center" style="color: #170085;">Se você tiver uma conta, acesse com seu endereço de e-mail e senha.</h5>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row py-1">

                                <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size: medium; font-weight: bold; color:rgba(0, 0, 0, 0.5);">*E-mail</label>

                                <div class="col-md-8 col-12">
                                    <input placeholder="Informe seu e-mail" id="email" type="email" class="form-control campos text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-1">
                                <label for="password" class="col-md-4 col-form-label text-md-right"  style="font-size: medium; font-weight: bold; color:rgba(0, 0, 0, 0.5);">*Senha</label>

                                <div class="col-md-8 col-12">
                                    <input id="password" type="password" placeholder="Informe sua senha" class="form-control campos text-center @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                
                           
                            <div class="form-group row">
                                <div class="col-md-9 my-1">
                                  
                                    <div class="form-check text-md-right py-2 pr-md-4" style="background-color: #f4d03b;">

                                        <!-- Default unchecked -->
                                        <div class="custom-control custom-checkbox">
                                             <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="remember">
                                            Lembrar de mim
                                        </label>
                                        </div>
                                        
                                      
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 my-1">
                                    <button type="submit" id="btn_login" class="col-12 btn btn-primary">
                                        Entrar
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
                            <a href="#"><img src={{ asset('img/pikachu1.png') }}  width="100%" height="100%" alt="pokemon"></a>
                        </div>   
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
