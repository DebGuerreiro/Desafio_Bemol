<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login Bemol</title>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Favicons -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center" style="background-color: #eeeeee;"> 
    <div class="container">
      <div class="row">
          <div class="col-md-4 offset-md-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <br>
                  <br>
                  <br>
                  <img class="mb-4" src="{{asset('bml01.png')}}" style="width:300px">
                  <br>
                  <br>
                  <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>
                  @if(session('status'))
                      <div class="alert alert-info">
                          {{ session('status') }}
                      </div>
                  @endif
                  <label for="inputEmail" class="sr-only">E-maik</label>
                  {{-- <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="E-mail" required autofocus> --}}
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                   
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                  <label for="inputPassword" class="sr-only">Senha</label>
                  {{-- <input type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Senha" required> --}}
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" placeholder="Senha" name="password" required autocomplete="current-password">
                  
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                  <br>

                    <a href="{{url('/cadastro')}}">Não tem conta? Cadastre-se</a>

                  <br>
                  <br>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
                </form>
            </div>
        </div>
        
    </div>    
</body>
</html>