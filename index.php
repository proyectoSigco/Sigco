
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sigco | Iniciar sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/sweetalert/sweetalert.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index2.html"><b>SIGCO</b></br>Gestión Comercial</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicie sesión para ingresar</p>
        <form action="mvc/controllers/controladorLogin.php?login=true" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Usuario" name="email" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Contraseña" name="clave" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Recordarme
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>

        <?php
        if (isset($_GET['login'])){
          ?>
          <script type="text/javascript">
              swal({   title: "Datos de ingreso invalidos",   text: "Por favor intentelo de nuevo",   type: "error",   showCancelButton: false,   confirmButtonColor: "#1B0092",   confirmButtonText: "Regresar",   closeOnConfirm: true }, function(){ });
          </script>
          <?php
        }
        ?>

          <?php
          if (isset($_GET['correo'])){
          ?>
          <script type="text/javascript">
              swal({   title: "Usuario inválido",   text: "El usuario no existe, verifique e intente de nuevo",   type: "error",   showCancelButton: false,   confirmButtonColor: "#1B0092",   confirmButtonText: "Regresar",   closeOnConfirm: true }, function(){ });
          </script>
          <?php
          }
          ?>

          <?php
          if (isset($_GET['sent'])){
              if ($_GET['sent']==false){
                  ?>
                  <script type="text/javascript">
                      swal({   title: "ERROR",   text: "No se proceso la solicitud, intentelo de nuevo o contacte al administrador",   type: "error",   showCancelButton: false,   confirmButtonColor: "#1B0092",   confirmButtonText: "Regresar",   closeOnConfirm: true }, function(){ });
                  </script>
                  <?php


              }else{
          ?>
          <script type="text/javascript">
              swal({   title: "Restablecer contraseña",   text: "Por favor siga las instruccines enviadas a su correo electrónico",   type: "info",   showCancelButton: false,   confirmButtonColor: "#1B0092",   confirmButtonText: "Regresar",   closeOnConfirm: true }, function(){ });
          </script>
          <?php
          }}
          ?>
        <a href="#modal1">Olvidé mi contraseña</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<style>


    .modalmask {
        position: fixed;
        font-family:  , sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.8);
        z-index: 99999;
        opacity:0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }
    .modalmask:target {
        opacity:1;
        pointer-events: auto;
    }
    .modalbox{
        border: 10px solid black;
        width: 400px;
        position: relative;
        padding: 5px 20px 13px 20px;
        background: #fff;
        color: #000;
        border-radius:9px;
        -webkit-transition: all 500ms ease-in;
        -moz-transition: all 500ms ease-in;
        transition: all 500ms ease-in;

    }

    .movedown {
        margin: 0 auto;
    }

    .modalmask:target .movedown{
        margin:10% auto;
    }

    .close {
        background: black;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: 1px;
        text-align: center;
        top: 1px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        border-radius:3px;
        font-size:16px;
    }

    .close:hover {
        background: #FAAC58;
        color:#222;
    }

</style>
    <div id="modal1" class="modalmask">
        <div class="modalbox movedown">
            <a href="#close" title="Close" class="close">X</a>
            <div class="login-box-body">
                <div class="login-logo">
                    <a ><b>Restablecer contraseña</b></a>
                </div>
                <h4 class="login-box-msg">Por favor ingrese su usuario</h4>
                <form action="mvc/controllers/controladorLogin.php?forget=true" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="col-md-12 text-center">
                        <button id="test" type="submit" class="btn btn-primary">Restablecer Contraseña</button>
                        </div>
                </form>
                <br><br>
</div>

            </div>
    </div>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>