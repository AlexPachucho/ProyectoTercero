<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Choices.js-->
  <link rel="stylesheet" href="{{asset('vendor/choices.js/public/assets/styles/choices.min.css')}}">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
  <!-- Agrega estos enlaces en la sección head de tu archivo Blade o en tu plantilla principal -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer">
            <span>Close </span>
            <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
              <use xlink:href="#close-1"> </use>
            </svg>
          </div>
          <div class="row w-100">
            <div class="col-lg-8 mx-auto">
              <form class="px-4" id="searchForm" action="#">
                <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                  <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search" placeholder="What are you searching for...">
                  <button class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center" type="submit">Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between py-1">
        <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="{{route('dashboard')}}">
            <div class="brand-text brand-big"><strong class="text-primary">React</strong><strong>Native</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">R</strong><strong>N</strong></div>
          </a>
          <button class="sidebar-toggle">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
              <use xlink:href="#arrow-left-1"> </use>
            </svg>
          </button>
        </div>
        <ul class="list-inline mb-0">
          <li class="list-inline-item"><a class="search-open nav-link px-0" href="#">
              <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                <use xlink:href="#find-1"> </use>
              </svg></a></li>
          <!-- Messages dropdown -->

          <!-- Tasks dropdown                   -->

          <!-- Mega menu-->

          <!-- Languages dropdown    -->

          <!-- Nombre Usuario -->
          <li class="list-inline-item dropdown "><a class="nav-link text-sm text-reset px-1 px-lg-0" id="name_user" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->usu_nombres}} / {{ Auth::user()->name}}</span></a>
            <ul class="dropdown-menu dropdown-menu-end mt-sm-3 dropdown-menu-dark" aria-labelledby="languages">
              <!-- Cerrar Sesion -->
                <li class="list-inline-item logout px-lg-2"> <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="{{ route('logout') }}"> <span class="d-none d-sm-inline-block" onclick="event.preventDefault();cerrarSession.submit()">Cerrar Sesion <i class="bi bi-box-arrow-in-right"></i></span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#disable-1"> </use>
                    </svg></a>
                  <form action="{{ route('logout') }}" id="cerrarSession" method="POST">
                    @csrf
                  </form>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->

      <span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">MENU</span>
      <ul class="list-unstyled">
        <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('dashboard') }}">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#real-estate-1"> </use>
            </svg><span>Inicio </span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('cursos.index') }}">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg><span>Cursos </span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('users.index') }}">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg><span>Usuarios </span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('genera_ordenes.index') }}">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg><span>GENERAR ORDENES</span></a></li>
        <!--<a class="nav-link active me-2" aria-current="page" href="{{ route('dashboard') }}">Inicio</a>
      <a class="nav-link active me-2" aria-current="page" href="{{ route('cursos.index') }}">Cursos</a>-->
      </ul>
      </ul>
    </nav>
    <div class="page-content">
      <!-- Page Header-->
      <section>
        @yield('content')
      </section>
      <section class="pt-0">

      </section>
      <section class="pt-0">

      </section>
      <section class="pt-0">

      </section>
      <section class="pt-0">

      </section>
      <section class="pt-0">

      </section>
      <section class="pt-0">

      </section>
      <!-- Page Footer-->
      <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">

      </footer>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('vendor/just-validate/js/just-validate.min.js') }}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{asset('vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
  <script src="{{asset('js/charts-home.js') }}"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite - 
    //   see more here 
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    // this is set to BootstrapTemple website as you cannot 
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>