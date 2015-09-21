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

    <link href="../../plugins/animate/animate.css" rel="stylesheet" type="text/css"/>
    <script src="../../plugins/messajes/jquery.noty.packaged.min.js"></script>

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

                    </div><!-- /.row -->
                </form>
            </section>


            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->

                <div class="row">
                    <div class="col-md-10">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Opciones de búsqueda</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">


                                <form role="form" action="../controllers/ControladorProducto.php?buscar=true" method="post">

                                    <div class="form-group">
                                        <label for="criterio">Seleccione un criterio de búsqueda*</label>
                                        <select class="form-control select2" name="criterio" id="criterio" required tabindex="1" autofocus>
                                            <option value="Productos.IdProducto" selected>Código de Producto</option>
                                            <option value="Productos.NombreProducto" >Nombre Producto</option>
                                            <option value="Productos.ValorBase">Precio Producto</option>
                                        </select>
                                    </div>

                                    <label for="comobuscar" class="margin">¿Qué desea encontrar?*</label>
                                    <div class="input-group input-group-sm margin">
                                        <div class="input-group-btn">
                                            <select name="comobuscar" id="comobuscar" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="2">
                                                <option selected value="1">Una búsqueda exacta de</option>
                                                <option value="2">Cualquier coincidencia de</option>
                                            </select>
                                        </div><!-- /btn-group -->
                                        <input type="text" name="busqueda" class="form-control" placeholder="Número Nit | Razón Social | Lugar" required tabindex="3">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="submit" tabindex="4">Buscar Producto</button>
                    </span>
                                    </div><!-- /input-group -->

                                </form>

                            </div>
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog" >
                                    <div class="modal-content" style="border-radius: 5px;">
                                        <div class="modal-header"   style="background-color: #3c8dbc;border-radius: 5px 5px 0px 0px;color:#FFF;text-align: center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 id="title" class="modal-title">Detalle de Producto</h4>
                                        </div>

                                        <div class="modal-body">

                                                <table class="pull-left col-md-8" >
                                                    <table class="pull-left col-md-8 ">
                                                        <tbody>
                                                        <tr>
                                                            <td ><strong >Código</strong></td>
                                                            <td> </td>
                                                            <td id="codigo" >02051</td>
                                                        </tr>

                                                        <tr>
                                                            <td ><strong >Nombre del Producto</strong></td>
                                                            <td> </td>
                                                            <td id="nombre">descrição do produto</td>
                                                        </tr>

                                                        <tr>
                                                            <td ><strong>Presentación</strong></td>
                                                            <td> </td>
                                                            <td id="presentacion">Marca do produto</td>
                                                        </tr>

                                                        <tr>
                                                            <td ><strong>Categoria</strong></td>
                                                            <td> </td>
                                                            <td id="category">0230316</td>
                                                        </tr>

                                                        <td><strong>Precio Unitario</strong></td>
                                                            <td> </td>
                                                            <td id="price">R$ 35,00</td>
                                                        </tr>

                                                        </tbody>
                                                </table>
                                                <div class="col-md-4">
                                                    <img class="img-thumbnail" id="image" src="../images/55e920f1d7044placeholder.png" alt=""/>
                                                </div>
                                                <div class="clearfix">
                                                    <strong>Descripción</strong>
                                                    <p class="info_open" id="description"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>

                                            <!--<p><input type="text" class="input-sm" id="txtfname"/></p>
                                            <p><input type="text" class="input-sm" id="txtlname"/></p>-->
                                        </div>

                                            <div class="modal-footer">

                                                <div class="text-right pull-right col-md-3">
                                                    Precio: <br>
                                                    <span class="h3 text-muted"><strong id="precioU">R$35,00</strong></span>
                                                </div>

                                            </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>

                        <div class="box box-info">
                            <div class="box-header with-border">

                                <p>

                                <h2 class="box-title">Listado de Productos </h2></p>

                                <!-- /.box-header -->


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

                                                                class="badge badge-inverse pull-right price"><?php setlocale(LC_MONETARY, 'en_US.UTF-8'); echo money_format('%.2n',$iterator['ValorBase']); ?></span>
                                                            <?php if (!strpos($iterator['rutaImagen'], 'sinImagen.jpg') !== false) { ?>
                                                                <img class="detail" src="<?php echo $iterator['rutaImagen'] ?>"
                                                                     alt="Unicorn Flux" class="img-responsive">
                                                            <?php } else { ?>
                                                                <img src="../images/55e920f1d7044placeholder.png"
                                                                     alt="Unicorn Flux" class="img-responsive">
                                                            <?php } ?>
                                                            <div>
                                                            <h3 class="clearfix">

                                                              <span class="pull-left">
                                                                <?php echo $iterator['NombreProducto'] ?>
                                                                  <small><?php echo $producto->presentacionId($iterator['IdPresentacionProductos'])['NombrePresentacion']; ?></small>
                                                              </span>


                                                            </h3>

                                                            <p>
                                                                <?php echo $iterator['DescripcionProducto'] ?>
                                                            </p>
                                                            </div>
                                                            <div class="clearfix">
                                                                <?php if($_SESSION['datosLogin']['NombreRol']=='Coordinador') {?>
                                                                <a href="../views/ModificarProducto.php?id=<?php echo $iterator['IdProducto']; ?>"  >
                                                                    <button class="btn btn-primary btn-xs "><i
                                                                            class="fa fa-pencil"></i></button>
                                                                </a>

                                                                    <button class="btn btn-danger btn-xs click"   value="<?php echo $iterator['IdProducto']; ?>"><i
                                                                            class="fa fa-trash "></i>
                                                                    </button>
                                                                <?php }?>
                                                                    <button class="btn btn-warning  btn-xs detail " value="<?php echo $iterator['IdProducto']; ?>">
                                                                    <i class="fa fa-eye "></i>
                                                                    </button>


                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>

                                    <?php
                                    }?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>

                                    </tr>
                                    </tfoot>




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
    <script src="../../plugins/Moneyformat/money.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
  <script>
      $(".click").click(function () {
          var btnId=$(this).attr("value");
          var n = noty({
              text: 'Desea eliminar este Registro?',
              theme: 'relax',
              layout: 'center',
              closeWith: ['click', 'hover'],
              buttons: [
                  {
                      addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {

                      $.post("../controllers/ControladorProducto.php",

                          {
                              deleteProducto: btnId


                          },
                          function (data) {

                              $noty.close();
                              noty({text: data, type: 'success'});
                              location.reload();
                          });
                  }
                  },
                  {
                      addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                      $noty.close();

                  }
                  }
              ],
              type: 'confirm',
              animation: {
                  open: 'animated wobble', // Animate.css class names
                  close: 'animated flipOutX', // Animate.css class names
              }

          });

      });
      $(".detail").click(function () {
          $.post("../controllers/ControladorProducto.php",

              {
                  detailProduct: $(this).attr("value")


              },
              function (data) {
                  var json = $.parseJSON(data);
                  $('#nombre').text(json.NombreProducto);
                  $('#title').text(json.NombreProducto);
                  $('#description').text(json.DescripcionProducto);
                  $('#category').text(json.IdCategoriaProductos);
                  var format=accounting.formatMoney(json.ValorBase);
                  $('#price').text(format);
                  $('#precioU').text(format);
                  $('#presentacion').text(json.IdPresentacionProductos);
                  $('#fecha').text(json.EstadoProducto);
                  $('#codigo').text(json.IdProducto);
                  $('#image').attr('src',json.rutaImagen);
                  $("#myModal").modal("show");

              });


      });

  </script>

</html>
