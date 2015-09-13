<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
session_start();
if ($_SESSION['datosLogin']['EstadoPersona']=="Inactivo" or !isset($_SESSION['datosLogin'])){
    header('location: Invalido.php');
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Nuevo cliente</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="../../dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/style.css" rel="stylesheet" type="text/css" />

    <!-- FORMVALIDATION -->
    <script type="text/javascript" src="../../plugins/jQuery/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../../plugins/formvalidation/formValidation.js"></script>
    <script type="text/javascript" src="../../plugins/formvalidation/framework/bootstrap.js"></script>
    <script type="text/javascript" src="../../plugins/formvalidation/language/es_ES.js"></script>



    <link rel="stylesheet" href="../../date/jquery-ui.css">
  <script src="../../date/jquery-ui.js"></script>
  <script src="../../date/jquery-ui.theme.css"></script>
<!--  <link rel="stylesheet" href="/resources/demos/style.css">-->

    <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
    <!-- FORMVALIDATION -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>GC</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SI</b>GCO</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The iterator image in the navbar-->
                                <img src="../../dist/img/<?php echo $_SESSION['datosLogin']['RutaImagenPersona'] ?>" class="user-image" alt="User Image" />
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $_SESSION['datosLogin']['Nombres'].' '.$_SESSION['datosLogin']['Apellidos'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The iterator image in the menu -->
                                <li class="user-header">
                                    <img src="../../dist/img/<?php echo $_SESSION['datosLogin']['RutaImagenPersona'] ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['datosLogin']['Nombres'].' '.$_SESSION['datosLogin']['Apellidos'] ?>
                                        <small><?php echo $_SESSION['datosLogin']['NombreRol']?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../controllers/controladorCerrarSesion.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar iterator panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../dist/img/<?php echo $_SESSION['datosLogin']['RutaImagenPersona'] ?>" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['datosLogin']['Nombres'].' '.$_SESSION['datosLogin']['Apellidos'] ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['datosLogin']['NombreRol']?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">Menu</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="index.php"><i class="fa fa-desktop"></i> <span>Inicio</span></a></li>
                    <?php
                    require'../facades/FacadeEmpleado.php';
                    $facade=new FacadeEmpleado();
                    $titulos=$facade->obtenerMenu($_SESSION['rol']['rol']);
                    foreach ($titulos as $menu ) {?>
                        <li class="treeview">
                            <a href="#"><i class="<?php echo $menu['Icono']?>"></i> <span><?php echo $menu['Nombre']?></span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <?php
                                $subtitulos=$facade->obtenerSubMenu($menu['IdCategoria']);
                                foreach ($subtitulos as $submenu ) { ?>
                                    <li><a href="<?php echo $submenu['Url']?>"><?php echo $submenu['NombrePagina']?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <?php
                    }
                    ?>
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Formulario de registro
                    <small>Clientes</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="#">Clientes</a></li>
                    <li class="active">Nuevo cliente</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <?php
                    require_once '../facades/ClienteFacade.php';
                    require_once '../models/ClientesDao.php';
                    require_once '../utilities/Conexion.php';
                    if (isset($_GET['cedulaPersona'])) {
                        $clienteFac = new ClienteFacade();
                        $cliente = $clienteFac->obtenerPersona($_GET['cedulaPersona']);
                        ?>

                        <!-- right column -->
                        <div class="col-md-10">
                            <form action="../controllers/ClientesController.php?controlar=crearSoloEmpresa"
                                  method="post" class="validacion" id="formValidacion">

                                <!-- general form elements disabled -->
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Nueva empresa para un cliente</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <p>
                                                Por favor diligencie el siguiente formulario para añadir una empresa a un
                                                cliente previamente registrado.<br><br>
                                                Recuerde que este formulario contiene campos obligatorios(*).
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="box box-default collapsed-box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Ver información personal registrada</h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div><!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="Cedula">Cédula*</label>
                                            <input type="text" name="Cedula" id="Cedula" class="form-control" readonly
                                                   value="<?php echo $cliente['CedulaPersona']; ?>"
                                                   required tabindex="10"/>
                                        </div>


                                        <div class="form-group">
                                            <label for="Nombres">Nombres*</label>
                                            <input type="text" name="Nombres" id="Nombres" class="form-control" readonly
                                                   value="<?php echo $cliente['Nombres']; ?>"
                                                   required tabindex="11"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Apellidos">Apellidos*</label>
                                            <input type="text" name="Apellidos" id="Apellidos" class="form-control" readonly
                                                   value="<?php echo $cliente['Apellidos']; ?>" required tabindex="12"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Celular">Celular*</label>
                                            <input type="text" name="Celular" id="Celular" class="form-control" readonly
                                                   value="<?php echo $cliente['CelularPersona']; ?>" required
                                                   tabindex="13"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email1">Email*</label>
                                            <input type="email" name="Email1" id="Email1" class="form-control" readonly
                                                   value="<?php echo $cliente['EmailPersona']; ?>" required tabindex="14"/>
                                        </div>

                                        <!-- /.box-footer -->
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Añadir información corporativa</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">


                                        <div class="form-group">
                                            <label for="Nit">NIT*</label>
                                            <input type="text" name="Nit" id="Nit" class="form-control"
                                                   placeholder="9024552452" autofocus required tabindex="1"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="RazonSocial">Razón social*</label>
                                            <input type="text" name="RazonSocial" id="RazonSocial" class="form-control"
                                                   placeholder="Mi Empresa Inc" required tabindex="2"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Direccion">Dirección*</label>
                                            <input type="text" name="Direccion" id="Direccion" class="form-control"
                                                   placeholder="Calle 34 No. 32 - 42" required tabindex="3"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Telefono">Teléfono principal*</label>
                                            <input type="text" name="Telefono" id="Telefono" class="form-control"
                                                   placeholder="634342"
                                                   required tabindex="4"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email2">Email corporativo*</label>
                                            <input type="email" name="Email2" id="Email2" class="form-control"
                                                   placeholder="info@empresa.com" required tabindex="5"/>
                                        </div>


                                        <div class="form-group">
                                            <label for="IdLugar">Lugar*</label>
                                            <select class="form-control select2" name="IdLugar" id="IdLugar" required
                                                    tabindex="6">
                                                <option disabled selected>Seleccione...</option>
                                                <?php
                                                require_once '../models/LugaresDao.php';
                                                require_once '../utilities/Conexion.php';
                                                $lugaresDao = new LugaresDao();
                                                $todasCiudades = $lugaresDao->listarTodas();
                                                foreach ($todasCiudades as $ciudad) {
                                                    ?>
                                                    <option
                                                        value="<?php echo $ciudad['IdLugar'] ?>"><?php echo $ciudad['NombreLugar'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="IdTipo">Tipo de cliente*</label>
                                            <select class="form-control select2" name="IdTipo" id="IdTipo" required
                                                    tabindex="7">
                                                <option selected="selected" disabled>Seleccione...</option>
                                                <?php
                                                require_once '../models/TiposClienteDao.php';
                                                require_once '../utilities/Conexion.php';
                                                $tiposCliente = new TiposClienteDao();
                                                $todosTiposCliente = $tiposCliente->listarTodos();
                                                foreach ($todosTiposCliente as $tipo) {
                                                    ?>
                                                    <option
                                                        value="<?php echo $tipo['IdTipo'] ?>"><?php echo $tipo['NombreTipo'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="IdActividad">Actividad del cliente*</label>
                                            <select class="form-control select2" name="IdActividad" id="IdActividad"
                                                    required
                                                    tabindex="8">
                                                <option selected="selected" disabled>Seleccione...</option>
                                                <?php
                                                require_once '../models/ActividadesClienteDao.php';
                                                require_once '../utilities/Conexion.php';
                                                $actividadesCliente = new ActividadesClienteDao();
                                                $todasActividadesCliente = $actividadesCliente->listarTodas();
                                                foreach ($todasActividadesCliente as $actividad) {
                                                    ?>
                                                    <option
                                                        value="<?php echo $actividad['IdActividad'] ?>">
                                                        <?php echo $actividad['NombreActividad'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="box-footer">
                                            <input type="button" class="btn btn-warning" tabindex="16"
                                                   onclick="location.href='buscarClientes.php'" value="Cancelar"/>
                                            <button type="submit" class="btn btn-success pull-right" tabindex="15"
                                                    value="guardar" name="guardar" id="guardar">Añadir empresa al cliente
                                            </button>
                                        </div>
                                        <!-- /.box-footer -->
                                        <!-- /.form-group -->
                                    </div>
                                </div>

                            </form>
                            <!-- /.box -->
                        </div>
                        <?php
                    }
                    ?>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>


      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->

        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">SIGCO</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
  <script type="text/javascript">
$(document).ready(function() {   

    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function generateCaptcha() {
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    }

    generateCaptcha(); 
    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
         
                locale: 'es_ES',

        fields: {
            cedula: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },
            meta: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es requerido'
                    }
                }
            },


        }
    });
});
</script>

  <script type="text/javascript">
      $(function () {
          //Initialize Select2 Elements
          $(".select2").select2();

          //Datemask dd/mm/yyyy
          $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
          //Datemask2 mm/dd/yyyy
          $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
          //Money Euro
          $("[data-mask]").inputmask();

          //Date range picker
          $('#reservation').daterangepicker();
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({
              timePicker: true,
              timePickerIncrement: 30,
              format: 'MM/DD/YYYY h:mm A'
          });
          //Date range as a button
          $('#daterange-btn').daterangepicker(
              {
                  ranges: {
                      'Today': [moment(), moment()],
                      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                      'This Month': [moment().startOf('month'), moment().endOf('month')],
                      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                  },
                  startDate: moment().subtract(29, 'days'),
                  endDate: moment()
              }
          );

          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass: 'iradio_minimal-blue'
          });
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
              checkboxClass: 'icheckbox_minimal-red',
              radioClass: 'iradio_minimal-red'
          });
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass: 'iradio_flat-green'
          });

          //Colorpicker
          $(".my-colorpicker1").colorpicker();
          //color picker with addon
          $(".my-colorpicker2").colorpicker();

          //Timepicker
          $(".timepicker").timepicker({
              showInputs: false
          });
      });
  </script>
</html>
