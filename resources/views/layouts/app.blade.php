<!-- app.blade.php -->
<html>
<head>
    <!-- bibliotheque tiers (bootstrap, fontawesome...) -->
    <!-- lien style js ... -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href="{{asset ('css/style.css')}}">
    <title>Gestion des tâches</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Gestion des tâches</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if (Auth::guest())
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/login">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Inscription</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/">Liste</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/add-task">Nouvelle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Déconnexion</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
      
      @if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
      @endif

        @yield('content')
    </div>

    <footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </footer>
</body>
</html>