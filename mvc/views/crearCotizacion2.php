<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
include_once'../models/ProductosCotizados.php';
session_start();
if ($_SESSION['datosLogin']==null || $_SESSION['datosLogin']['EstadoPersona']=="Inactivo") /*|| $_SESSION['rol']['rol']!=3)*/{
    header('location: Invalido.php');
}
$cliente=$_GET['idcliente'];
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Registrar cotizacion</title>
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

      <script type="text/javascript" src="../../plugins/select2/select2.js"></script>
      <link href="../../plugins/select2/select2.css" rel="stylesheet" type="text/css" />

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
                    <small>Cotización</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="#">Cotizaciones</a></li>
                    <li class="active">Registrar</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <!-- right column -->
                    <div class="col-md-10">

                        <?php
                        if (isset($_GET['mensaje'])) {
                            ?>
                            <div class="alert
                      <?php if ($_GET['error'] == 1) {
                                echo 'alert-error';
                            } else {
                                echo 'alert-info';
                            } ?>
                      alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4>Resultado del proceso:</h4>
                                <?php
                                echo $mensaje = $_GET['mensaje'] ?>
                            </div>

                            <?php
                            if (isset($_GET['detalleerror']) && $_GET['error'] == 1) {
                                ?>

                                <div class="box box-danger collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Ver detalle del error</h3>

                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                            </button>
                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p>
                                            <?php echo $mensaje = $_GET['detalleerror'] ?>
                                        </p>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        Contacte al administrador para corregir el inconveniente: admin@sigco.com
                                    </div>
                                </div><!-- /.box -->
                                <?php
                            }
                        }
                        ?>
                        <form id="defaultForm" action="../controllers/controladorCotizacion.php?agregar=true&idcliente=<?php echo $cliente?>" method="post">

                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Nueva Cotización</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="form-group">
                                        <p>
                                            Por favor diligencie el siguiente formulario para registrar una nueva
                                            cotización.<br><br>
                                            Recuerde que este formulario contiene campos obligatorios(*).
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- general form elements disabled -->


                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Datos Cliente</h3>
                                </div>

                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="cantidad">ID cliente:*</label>
                                        <input class="form-control" name="idcliente" id="idcliente" type="text" value="<?php echo $cliente?>" readonly>
                                    </div>

                                </div>

                            </div>


                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Datos de los productos:</h3>
                                </div>

                                <?php
                                if (isset($_SESSION['productoDatos'])) {

                                    ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>IdProducto</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>IVA</th>
                                            <th>Valor Unitario</th>
                                            <th>Subtotal</th>
                                            <th>Remover</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=0;
                                        $total=0;
                                        foreach ($_SESSION['productoDatos'] as $test) {
                                            ?>
                                            <tr>
                                                <td><?php echo $test->getId()?></td>
                                                <td><?php echo $test->getNombre()?></td>
                                                <td><?php echo $test->getCantidad()?></td>
                                                <td><?php echo $test->getIva()?></td>
                                                <td><?php echo $test->getValorBase()?></td>
                                                <td><?php echo $test->getSubtotal()?></td>
                                                <td> <a data-toggle="tooltip" title="Remover" href="crearCotizacion2.php?idcliente=<?php echo $cliente?>&removerproducto=true&posicion=<?php echo $i?>">
                                                        <i class="fa fa-fw fa-remove" ></i>
                                                    </a></td>
                                            </tr>

                                            <?php
                                            $i++;
                                            $total=$total+$test->getSubtotal();
                                        }
                                        if (isset($_GET['removerproducto'])){
                                            array_splice($_SESSION['productoDatos'],$_GET['posicion'],1);?>
                                            <meta http-equiv="Refresh" content="0;url=crearCotizacion2.php?idcliente=<?php echo $cliente?>">
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }?>
                                <hr>
                                <?php if (isset($_SESSION['productoDatos'])) {?>

                                    <h4 class="text-center">Total:<?php echo '$'.(int)$total;?></h4>
                                    <hr>
                                <?php }
                                ?>
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="cc">Seleccione el producto*</label>
                                        <select class="form-control select2" name="idproducto" id="idproducto">
                                            <?php
                                            include_once'../facades/FacadeProducto.php';
                                            $facade=new Facade();
                                            $listado=$facade->getProductos();
                                            $existe=false;
                                            foreach ($listado as $clientes ) {

                                                foreach ($_SESSION['productoDatos'] as $comparar ) {
                                                        if ($comparar->getId()==$clientes['IdProducto']){
                                                            $existe=true;
                                                        }
                                                }

                                                if ($existe==false){ ?>
                                                    <option class="pro" value="<?php echo $clientes['IdProducto']?>"><?php echo $clientes['NombreProducto']?></option>
                                                    <?php
                                                }
                                           $existe=false;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad:*</label>
                                        <input class="form-control" name="cantidad" id="cantidad" type="text" placeholder="1">
                                    </div>
                                    <button class="btn btn-primary pull-right" type="submit"
                                            value="agregar" name="agregar" id="agregar">Agregar producto
                                    </button>
                                </div>

                            </div>
                        </form>

                        <form id="defaultForm" action="../controllers/controladorCotizacion.php?finalizar=true&idcliente=<?php echo $cliente?>" method="post">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Datos Cotización</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="cantidad">Observaciones Cotización:*</label>
                                        <input class="form-control" name="observaciones" id="cantidad" type="text" placeholder="1">
                                    </div>


                                    <div class="box-footer">
                                        <input type="button" class="btn btn-warning" tabindex="15"
                                               onclick="location.href='clientes.php'" value="Cancelar"/>


                                        <button type="submit" class="btn btn-success pull-right" tabindex="14"
                                                value="guardar" name=" guardar" id="guardar">Finalizar cotización
                                        </button>



                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                    <!-- /.box -->
                </div>
        </div>

        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div><!-- /.content-wrapper -->


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
<script>
    $(".select2").select2();

</script>
</html>
