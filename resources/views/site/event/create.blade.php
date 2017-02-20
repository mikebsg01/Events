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
<body ng-controller="EventController">
<div class="row">
  <div class="col s12">
    <div class="col s8 offset-s2">
      <div class="card">
        <div class="card-content">
          <span class="card-title">
            <i class="material-icons prefix">perm_contact_calendar</i>
            Crear un evento
          </span>
          {!! Form::open(['url' => '#', 'class' => 'event-form']) !!}
            <div class="row">
              <div class="col s6">
                <div class="input-field col s11">
                  {!! Form::text('event[name]', null, ['id' => 'event-name', 'class' => 'validate', 'required' => 'required']) !!}
                  {!! Form::label('event-name', 'Nombre') !!}
                </div>
                <div class="input-field col s11">
                  {!! Form::textarea('event[description]', null, ['id' => 'event-description', 'class' => 'validate materialize-textarea', 'required' => 'required']) !!}
                  {!! Form::label('event-description', 'Descripción') !!}
                </div>
              </div>
              <div class="col s6 center-align">
                <div class="col s12 center-align">
                  <span>Agregar Imagen</span>
                </div>
                <div class="col s12">
                  <div class="event-image-container">
                    <div class="responsive-img event-image"></div>
                  </div>
                </div>
                <!--
                <div class="file-field input-field">
                  <div class="waves-effect waves-light btn">
                    <span>File</span>
                    <input type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
                -->
              </div>
              <div class="col s12">
                <div class="col s6">
                  <div class="col s12 start-date-label">
                    <span>Fecha de Inicio</span>
                  </div>
                  <div class="date-field input-field col s6">
                    {!! Form::date('event[start_date][date]', '00/00/2017', ['id' => 'event-start-date-date', 'class' => 'validate center-align', 'required' => 'required']) !!}
                  </div>
                  <div class="date-field input-field col s5">
                    {!! Form::time('event[start_date][time]', '00:00 AM', ['id' => 'event-start-date-time', 'class' => 'validate center-align', 'required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="col s12">
                <div class="col s6">
                  <div class="col s12 end-date-label">
                    <span>Fecha de Finalización</span>
                  </div>
                  <div class="date-field input-field col s6">
                    {!! Form::date('event[end_date][date]', '00/00/2017', ['id' => 'event-end-date-date', 'class' => 'validate center-align', 'required' => 'required']) !!}
                  </div>
                  <div class="date-field input-field col s5">
                    {!! Form::time('event[end_date][time]', '00:00 AM', ['id' => 'event-end-date-time', 'class' => 'validate center-align', 'required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="col s12  center-align">
                <button type="submit" class="waves-effect waves-light btn light-blue darken-1">Crear & Publicar</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<!--
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
          <img src="{!! asset('public/assets/img/urcorp-logo.svg') !!}" class="logo-urcorp">
        </a>
      </div>
    </div>
  </footer>
</div>
-->
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.min.js?v='.time()) !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/materialize.js?v='.time()) !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/angular.js?v='.time()) !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/app.js?v='.time()) !!}"></script>
</body>
</html>