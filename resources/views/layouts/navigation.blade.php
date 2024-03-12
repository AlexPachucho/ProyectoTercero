<nav class="navbar navbar-expand-lg bg-body-tertiary" background-color: #e3f2fd;>
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active me-2" aria-current="page" href="{{ route('cursos.index') }}">Cursos</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->usu_nombres}} / {{ Auth::user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
            <li><a class="dropdown-item" onclick="event.preventDefault();cerrarSession.submit()">Cerrar Sesion</a></li>
                <form action="{{ route('logout') }}" id="cerrarSession" method="POST">
                @csrf   
                </form>
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
