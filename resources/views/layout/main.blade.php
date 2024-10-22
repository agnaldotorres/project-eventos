<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bowlby+One+SC&display=swap" rel="stylesheet">    

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
      </head>

        

    <body class="fundo">
      <header> 
        <div class="navbar navbar-expand-lg navbar-light"> 
          <li class="nav-item">
            <a href="/events/create" class="navbar-link">Criar Eventos</a>
          </li>
          <li class="nav-item">
            <a href="/" class="navbar-link">Eventos</a>
          </li>
          @auth
            <li class="nav-item">
              <a href="/dashboard" class="navbar-link">Meus eventos</a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                  @csrf
                <a href="#" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
              </form>
            </li>
          @endauth
          @guest
            <li class="nav-item">
              <a href="/login" class="navbar-link">Entrar</a>
            </li>
            <li class="nav-item">
              <a href="/register" class="navbar-link">Cadastrar</a>
            </li>
          @endguest
        </div>
      </header>
       <main>
        <div class="container-fluid">
          <div class="row brs">
            @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
          </div>
        </div>
       </main>

      <footer>
        <p>HDC Events &copy; 2024</p>
      </footer>

      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
        
</html>
