<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>
  <script src="https://kit.fontawesome.com/1d6f563437.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="stylesheet" href="http://propeller.in/components/textfield/css/textfield.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/estilo.css') }}" rel="stylesheet" >
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  @yield('css')
  
  @yield('javascript')
    
</head>
<body>
    <div id="app"  style="background-color: white !important;">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="background-color: white !important; border-top: 10px solid #f95240;"> 

            <div class="container">
                
                <div class="col-lg-2 col-12 text-center" style="background-color: white" >

                    <a class="navbar-brand" id="logo" href="{{ url('/') }}"><img src="{{ asset('img/teste2.png') }}" width="232px" height="95px" alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span></button>
                
                
                </div>
            
        
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">

                    <div class="col-1" style="background-color: white">


                    </div>  

                    <div class="col-lg-5">
                        <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
                            <input class="col-9 form-control mr-lg-1 mr-0" name="query" id="borda-input" type="search" value="{{request()->input('query')}}" placeholder="Pesquisa" aria-label="Search" required>
                            <button class="col-lg-2 col-3 btn btn-outline-success" id="buscar" type="submit"><i
                                class="fas fa-search"></i></button>
                          </form>


                    </div>  

                   
                    <div class="col-lg-6 col-12 text-center">

                        <ul class="navbar-nav ">

                            @guest

                            <div class="col-lg-4 my-lg-0 my-1">

                                

                            </div>  


                            <div class="col-lg-4 my-lg-0 my-1">
                                    <li class="nav-item">
                                        <a class="nav-link" id="btn_login" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                            </div>  
                            <div class="col-lg-4 col-12 my-lg-0 my-1">
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" id="btn_cadastro" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                                    </li>
                                @endif
                            </div>  
                            @else

                            <div class="col-lg-5 mt-lg-1">

                                @if (Auth::user()->cart != null)
                                <li class="nav-item">
                                     <span class="nav-link" style="font-size: medium; font-weight: bold;"><a href="{{ route('cart')}}"><img src="{{ asset('img/cart.png') }}" width="70%" height="100%" alt="">
                                         {{ Auth::user()->cart->products()->count() }}                         
                                    </a></span>                  
                                </li> 
                                @else
                                <li class="nav-item">
                                    <span class="nav-link" style="font-size: medium; font-weight: bold;"><a href="{{ route('cart')}}"><img src="{{ asset('img/cart.png') }}" width="70%" height="100%" alt="">
                                                                
                                   </a></span>                  
                               </li>  
                                @endif
                           

                            </div>  



                            <div class="col-lg-5 col-12">
                                <li class="nav-item">
                                    <?php
                                    $nome_usuario = explode(" ", Auth::user()->name );
                                    ?>
                                    <span class="nav-link pt-lg-3" style="font-size: medium; font-weight: bold;"> Olá, <br> <?php echo $nome_usuario[0] ?> </span>
                                </li>
                            </div> 

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src={{ asset('img/avatar.png') }} class="rounded-circle z-depth-0" alt="avatar image"
                                        style="cursor:pointer; width:70px; height:70px; border: 2px solid #f7f7f7 !important;">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">Meu Perfil</a>
                                    <a class="dropdown-item" href="{{ route('orders.index')}}">Meus Pedidos</a>
                                    @if(Auth::user()->isAdmin())
                                    <a href="{{ route('products.index') }}" class="dropdown-item">Gerenciar Produtos</a>
                                    @endif       
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                    </div>
                                </li>
                                
                                @endguest
                        </ul>

                    </div>

               </div>
            </div>
        </nav>
 
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm" id="categoria"  style="background-image:url({{ asset('img/t.svg') }}); border-top: 1px solid #f2f2f2 !important;" >
            <div class="container">

                <div class="col-12 text-center justify-content-center">
                    <div class="row text-center" id="menu">
                            @foreach(\App\Category::all() as $category)
                                <li><a class="dropdown-item text-center" href="{{ route('search-category', $category->id) }}">{{$category->name}}</a></li> 
                            @endforeach
                    </div>
                </div>

            </div>
            
        </nav>


        <main class="py-4 container">
            
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{session()-> get('success')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               {{session()-> get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

        <!--- 'auth' Verifica se o usuário está logado --->
            @auth
               
                @if(Auth::user()->isAdmin())

                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('products.create')}}" class="col-12 btn btn-primary btn-lg mb-2" style="color: white;">Novo Produto</a>
                            <ul class="menu_lateral list-group my-2">
                                <a href="{{ route('products.index')}}"><li class="list-group-item {{ Request::is('products') ? 'ativo' : '' }}"><i class="fas fa-gamepad pr-2"></i>Produtos</li></a>
                                <a href="{{ route('categories.index')}}"><li class="list-group-item {{ Request::is('categories') ? 'ativo' : '' }}"><i class="fas fa-star pr-2"></i>Categorias</li></a>
                                <a href="{{ route('tags.index')}}"><li class="list-group-item {{ Request::is('tags') ? 'ativo' : '' }}"><i class="fas fa-tags pr-2"></i>Tags</li></a>
                                <a href="{{ route('users.index') }}"><li class="list-group-item {{ Request::is('users') ? 'ativo' : '' }}"><i class="fas fa-user-friends pr-2"></i>Usuários</li></a>
                            </ul>
                            <hr>
                            <ul class="menu_lateral list-group my-2">
                                <a href="{{ route('orders.index')}}"><li class="list-group-item {{ Request::is('orders') ? 'ativo' : '' }}"><i class="fas fa-folder-open pr-2"></i>Pedidos</li></a>
                            </ul>
                            <hr>
                            <ul class="menu_lateral list-group mt-2">
                            <a href="{{ route('trashed-products.index')}}"> <li class="list-group-item {{ Request::is('trashed-products') ? 'ativo' : '' }}"><i class="fas fa-ghost pr-2"></i>Lixeira de Produtos</li></a>
                                <a href="{{ route('trashed-categories.index')}}"><li class="list-group-item {{ Request::is('trashed-categories') ? 'ativo' : '' }}"><i class="fas fa-ghost pr-2"></i>Lixeira de Categorias</li></a>
                                <a href="{{ route('trashed-tags.index')}}"><li class="list-group-item {{ Request::is('trashed-tags') ? 'ativo' : '' }}"><i class="fas fa-ghost pr-2"></i>Lixeira de Tags</li></a>
                            </ul>
                        </div>
                
                        <div class="col-md-9">
                            @yield('content')
                        </div> 
                    </div>
                @else
                    @yield('content')
                @endif


            <!--- 'else' Se não tiver logado --->
            @else
                @yield('content')
            @endauth
        </main>
    </div>

    <footer id="myFooter" >

        <div class="container"> 
              
            <hr>   
                <div class="row text-center">
    
                    <div class="col-sm-4 col-12">
                        <h5>Institucional</h5>
                        <ul>
                            <li><a href="#">Quem Somos</a></li>
                            <li><a href="#">Redes Sociais</a></li>
                            <li><a href="#">Politica de Segurança</a></li>
                        </ul>
                    </div>
    
                    <div class="col-sm-4 col-12">
                        <h5>Atendimento</h5>
                        <span>(11) 99763-7729</span><br>
                        <span>Segunda a Sexta Feira das 08 ás 18hrs</span><br>
                        <span>sac@meudominio.com</span>
                    </div>
    
                    <div class="col-sm-4 col-12">
                        <h5>Suporte</h5>
                        <ul>
                            <li><a href="#">Central de Ajuda</a></li>
                            <li><a href="#">Termos e Política de Privacidade</a></li>
                        </ul>
                    </div>
    
                
                </div>
                <hr>     
                <div class="row text-center">
    
                    <div class="col-lg-2 col-12">
                        <div class="text-center">
                            <a href="index.php"><img src={{ asset('img/99.png') }}  width="160px" height="100%" alt="pokemon"></a>
                        </div>   
                    </div>
    
                
                    <div class="col-lg-7 col-12 pt-3 ">
                        
                        <span>Preços e condições de pagamento exclusivos para compras via internet, podendo variar nas lojas físicas.</span><br>
                        <span>Caso os produtos apresentem divergências de valores, o preço válido é o do Carrinho de compras.</span> 
                    </div>        
                    
                    <div class="col-lg-1 col-12 pt-3">
                        <ul>
                            <li><a href="#categoria"><i class="fas fa-arrow-circle-up"></i></a></li>
                        </ul>
                    </div>
    
                    <div class="col-lg-2 col-12">
                        <div class="text-center">
                            <a href="index.php"><img src={{ asset('img/10.png') }}  width="160px" height="100%" alt="pokemon"></a>
                        </div>   
                    </div>
    
                </div>
    
       </div>
    
        <div class="second-bar">
            <div class="footer-copyright">
                <p>© 2020 Game Bros. - Todos os direitos reservados </p>
            </div>
        </div>
    
    </footer>

</body>
</html>
