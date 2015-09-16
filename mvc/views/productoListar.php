<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
session_start();
if ($_SESSION['datosLogin']==null || $_SESSION['datosLogin']['EstadoPersona']=="Inactivo") /*|| $_SESSION['rol']['rol']!=3)*/{
    header('location: Invalido.php');
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Buscar producto</title>
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
                    Catálogo de Productos
                    <!--            <small>Optional description</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li class="active">Buscar</li>
                </ol>
                <form action="../controllers/ControladorProducto.php" method="post">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="input-group">

                                <input type="text" class="form-control" value="<?php if(isset($_GET['resultado'])){  echo $_GET['resultado']; } ?>" name="searchProduct" placeholder="buscar...">
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary" name="search" type="submit"><i class="fa fa-search "></i> buscar</button>
                                  </span>

                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <p>

                                <h2 class="box-title">Listado de Productos </h2></p>

                                <!-- /.box-header -->

                                <table id="example" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require '../facades/FacadeProducto.php';
                                    $producto = new Facade();

                                    if(isset($_GET['resultado'])) {
                                        $Productos = $producto->buscarProducto($_GET['resultado']);

                                    }
                                    else{
                                        $Productos = $producto->getProductos();
                                    }
                                    foreach ( $Productos as $iterator) { ?>


                                               <ul class="col-xs-6 col-centered" style="list-style-type: none">
                                                    <li class="span4">
                                                        <div class="thumbnail" style="text-align: center">
                                                            <span
                                                                class="badge badge-inverse pull-right price">$<?php echo $iterator['ValorBase']; ?></span>
                                                            <?php if (!strpos($iterator['rutaImagen'], 'sinImagen.jpg') !== false) { ?>
                                                                <img src="<?php echo $iterator['rutaImagen'] ?>"
                                                                     alt="Unicorn Flux" class="img-responsive">
                                                            <?php } else { ?>
                                                                <img src="../images/55e920f1d7044placeholder.png"
                                                                     alt="Unicorn Flux" class="img-responsive">
                                                            <?php } ?>
                                                            <h3 class="clearfix">
                                                              <span class="pull-left">
                                                                <?php echo $iterator['NombreProducto'] ?>
                                                                  <small><?php echo $producto->presentacionId($iterator['IdPresentacionProductos'])['NombrePresentacion']; ?></small>
                                                              </span>


                                                            </h3>
                                                            <p>
                                                                <?php echo $iterator['DescripcionProducto'] ?>
                                                            </p>

                                                            <div class="clearfix">

                                                                <a href="../views/ModificarProducto.php?id=<?php echo $iterator['IdProducto']; ?>">
                                                                    <button class="btn btn-primary "><i
                                                                            class="fa fa-pencil"></i></button>
                                                                </a>
                                                                <a href="../views/ModificarProducto.php?id=<?php echo $iterator['IdProducto']; ?>">
                                                                    <button class="btn btn-danger "><i
                                                                            class="fa fa-trash"></i></button>
                                                                </a>
                                                                <a href="../views/ModificarProducto.php?id=<?php echo $iterator['IdProducto']; ?>">
                                                                    <button class="btn btn-warning "><i
                                                                            class="fa fa-eye"></i></button>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>

                                    <?php
                                    }?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>

                                    </tr>
                                    </tfoot>

                                </table>


                                <!-- /content-panel -->
                            </div>
                        </div>
                    </div>

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
  <script>
      $("#modificar").click(function () {
          var n = noty({
              text: 'Desea eliminar este Registro',
              theme: 'relax',
              layout: 'center',
              closeWith: ['click', 'hover'],
              buttons: [
                  {
                      addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {

                      // this = button element
                      // $noty = $noty element

                      $noty.close();
                      noty({text: 'You clicked "Ok" button', type: 'success'});
                  }
                  },
                  {
                      addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                      $noty.close();
                      noty({text: 'You clicked "Cancel" button', type: 'error'});
                  }
                  }
              ],
              type: 'confirm',
              animation: {
                  open: 'animated bounceInRight', // Animate.css class names
                  close: 'animated bounceOutRight', // Animate.css class names
              }

          });

      });


  </script>
  <script>
      $(document).ready(function() {

          $('#example1').dataTable( {
              bSort: true,
              aoColumns: [ { sWidth: "45%" }, { sWidth: "45%" }, { sWidth: "10%", bSearchable: false, bSortable: false } ],
              "scrollY":        "500px",
              "scrollCollapse": true,
              "info":           true,
              "paging":         true
          } );
      } );
  </script>
</html>
