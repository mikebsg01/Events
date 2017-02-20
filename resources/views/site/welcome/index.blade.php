<!DOCTYPE html>
<html lang="es" ng-app="WTCEvents">
<head>
  <meta charset="utf-8">
  <title>WTC Querétaro | Events</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans%3A300&subset=latin%2Call&ver=4.7.1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/font-awesome.min.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/materialize.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/style.css?v='.time()) !!}">
</head>
<body ng-controller="WelcomeController">
<!-- Modal - Log In -->
<div id="login-modal" class="login-modal modal">
  <div class="modal-content">
    <div class="row">
      <div class="col s12">
        <h4 class="center-align">Iniciar sesión</h4>
      </div>
      <div class="col s12 login-form-container">
        {!! Form::open(['url' => '/login', 'method' => 'POST', 'id' => 'login-form', 'class' => 'login-form']) !!}
          <div class="input-field col s11">
            <i class="material-icons prefix">account_circle</i>
            <input id="login-email" type="email" name="email" class="validate" placeholder="example@mail.com" required="required">
            <label for="login-email">E-mail</label>
          </div>
          <div class="input-field col s11">
            <i class="material-icons prefix">vpn_key</i>
            <input id="login-password" type="password" name="password" class="validate" placeholder="Ej. 12345678" required="required">
            <label for="login-password">Contraseña</label>
          </div>
          <div class="input-field col s12">
            <div class="center">
              <button type="submit" class="btn-submit center-align modal-action waves-effect waves-light btn">
                Iniciar sesión
              </button>
              <div ng-show="sendingData == true" class="login-preloader preloader-wrapper small active">
                <div class="spinner-layer spinner-blue-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
      <div class="col s10 offset-s1 center-align">
        <span>¿Aún no tienes una cuenta? <a href="#signup" ng-click="showModal('signup')">click aquí para Registrarse.</a></span>
      </div>
    </div>
  </div>
</div>
<!-- Modal - Sign Up -->
<div id="signup-modal" class="signup-modal modal modal-fixed-footer">
  {!! Form::open(['url' => '/register', 'method' => 'POST', 'id' => 'signup-form', 'class' => 'signup-form']) !!}
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <h4 class="center-align">Registrarse</h4>
        </div>
        <div class="col s12">
          <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="signup-firstname" type="text" name="first_name" class="validate" required="required">
            <label for="signup-firstname">Nombre(s)</label>
          </div>
          <div class="input-field col s6">
            <input id="signup-lastname" type="text" name="last_name" class="validate" required="required">
            <label for="signup-lastname">Apellido(s)</label>
          </div>
          <div class="input-field col s10">
            <i class="material-icons prefix">account_circle</i>
            <input id="signup-username" type="text" name="username" class="validate" required="required">
            <label for="signup-username">Nombre de Usuario</label>
          </div>
          <div class="input-field col s10">
            <i class="material-icons prefix">email</i>
            <input id="signup-email" type="email" name="email" class="validate" placeholder="example@mail.com" required="required">
            <label for="signup-email">E-mail</label>
          </div>
          <div class="input-field col s10">
            <i class="material-icons prefix">vpn_key</i>
            <input id="signup-password" type="password" name="password" class="validate" placeholder="Ej. 12345678" required="required">
            <label for="signup-password">Contraseña</label>
          </div>
          <div class="input-field col s10">
            <i class="material-icons prefix">done</i>
            <input id="signup-confirm-password" type="password" name="password_confirmation" class="validate" placeholder="Ej. 12345678" required="required">
            <label for="signup-confirm-password">Confirmar Contraseña</label>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer center-align">
      <!-- something here -->
      <button type="submit" class="btn-submit center-align modal-action waves-effect waves-light btn">
        Registrarse
      </button>
      <div ng-show="sendingData == true" class="signup-preloader preloader-wrapper small active">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  {!! Form::close() !!}
</div>
<div class="row desktop-hero">
  <div class="header col s12">
    <div class="container">
      <div class="col l4">
        <img src="{!! asset('public/assets/img/v1/logo-wtcqro-transparent-1.png') !!}" class="img-logo">
      </div>
      <div class="col l8">
        <div class="right">
          <div class="app-navbar">
            <ul>
              @if (Auth::check())
                <li>
                  <a href="{!! URL::to('/logout') !!}">Cerrar Sessión</a>
                </li>
                <li>
                  <a href="#">
                    <span class="fa fa-user"></span>
                    {!! Auth::user()->full_name !!}
                  </a>
                </li>
              @else
                <li>
                  <a ng-click="showModal('login')" href="#create-event" class="active">Crear tu evento</a>
                </li>
                <li>
                  <a ng-click="showModal('login')" href="#login">Iniciar sesión</a>
                </li>
                <li>
                  <a ng-click="showModal('signup')" href="#signup">Registrarse</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12 content">
    <div class="container">
      <div class="col s12">
        <h1 class="center-align">Descubre Querétaro</h1>
      </div>
      <div class="col s12">
        <div class="col offset-s2 s8">
          <form action="/other" class="event-search-form">
            <input type="text" class="input-1 input-field col s10" placeholder="Encuentra un evento para ti">
            <button class="waves-effect waves-light btn col s2">Buscar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row recent-events">
  <div class="col s12">
    <div class="container">
      <div class="col offset-s1 s10">
        <header class="header">
          <h2 class="title center-align">Eventos destacados</h2>
        </header>
      </div>
      <div class="col offset-s1 s10">
        <?php
          $event_cards = [
            [ 
              'image_id'  => 1,
              'title'     => 'Coloquio de Matemáticas UAQ 2017',
              'price'     => 'FREE'
            ],
            [
              'image_id'  => 2,
              'title'     => 'Conferencia de Coworking',
              'price'     => '2500.00'
            ],
            [
              'image_id'  => 3,
              'title'     => 'Development of Progressive Web Apps',
              'price'     => '15000.00'
            ],
            [
              'image_id'  => 4,
              'title'     => 'Evento Anual Holiday Inn 2017',
              'price'     => '7500.00'
            ],
            [
              'image_id'  => 5,
              'title'     => 'ExpoTravel Querétaro 2017',
              'price'     => '3260.00'
            ],
            [
              'image_id'  => 6,
              'title'     => 'Curso de Pintura',
              'price'     => 'FREE'
            ]
          ];

          for ($i = 0; $i < rand(0, 3); ++$i) {
            $a = rand(1,6) - 1;
            $b = rand(1,6) - 1;
            $tmp = $event_cards[$a];
            $event_cards[$a] = $event_cards[$b];
            $event_cards[$b] = $tmp;
          }
          for ($i = 0; $i < 6; ++$i): 
        ?>
        <div class="col s4">
          <div class="col s12">
            <div class="card sticky-action">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{!! asset('public/assets/img/faker/office-'.$event_cards[$i]['image_id'].'.jpg') !!}">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?= substr($event_cards[$i]['title'], 0, 25) ?> <i class="material-icons right">more_vert</i></span>
                <span class="card-date">Lunes 16, Enero, 2017</span>
              </div>
              <div class="card-action">
                <a href="#" class="button">Ver más</a>
                <div class="price-content right">
                  <span class="price">
                    <?php if ($event_cards[$i]['price'] == 'FREE'): ?>
                      <?= $event_cards[$i]['price']; ?>
                    <?php else: ?>
                      <?= '$'.number_format($event_cards[$i]['price'], 2, '.', ','); ?>
                      <sup><small>MXN</small></sup>
                    <?php endif; ?>
                  </span>
                </div>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?= substr($event_cards[$i]['title'], 0, 25) ?><i class="material-icons right">close</i></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut nisi quis nisl tincidunt condimentum in vitae quam. Nam non magna eget metus gravida tincidunt eget non turpis. Praesent sodales egestas velit eu tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l12 s12">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="social-networks col l4 offset-l2 s12">
            <div class="row">
              <div class="right">
                <h5>Redes Sociales</h5>
              </div>
            </div>
            <div class="row">
              <div class="right">
                <a href="#">
                  <span class="icon facebook fa fa-facebook-square"></span>
                </a>
                <a href="#">
                  <span class="icon twitter fa fa-twitter-square"></span>
                </a>
                <a href="#">
                  <span class="icon google-plus fa fa-google-plus-square"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        &copy; <?= date('Y') ?> Todos los Derechos Reservados
        <a class="powered-link grey-text text-lighten-4 right" href="http://urcorp.mx/#contact">
          <span>Powered by</span>
          <img src="{!! asset('public/assets/img/v1/urcorp-logo.svg') !!}" class="logo-urcorp">
        </a>
      </div>
    </div>
  </footer>
</div>
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.min.js?v='.time()) !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/materialize.js?v='.time()) !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/angular.js?v='.time()) !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/app.js?v='.time()) !!}"></script>
</body>
</html>