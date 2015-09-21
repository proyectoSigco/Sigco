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
    <title> Modificar lugar </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../plugins/iCheck/all.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Color Picker -->
    <link href="../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap time Picker -->
    <link href="../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Select2 -->
    <link href="../../plugins/select2/select2.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>

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

    <?php
    require_once '../facades/LugaresFacade.php';
    if (isset($_GET['IdLugar'])) {
        $lugarFac = new LugaresFacade();
        $lugar = $lugarFac->obtenerLugar($_GET['IdLugar']);
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Formulario de modificación
                    <small>Lugares</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="#">Lugares</a></li>
                    <li class="active">Modificar lugar</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <!-- right column -->
                    <div class="col-md-10">
                        <form
                            action="../controllers/LugaresController.php?controlar=modificar&IdLugar=<?php echo $_GET['IdLugar']; ?>"
                            method="post" class="validacion" id="formValidacion">

                            <!-- general form elements disabled -->
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Modificar lugar</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <p>
                                            Por favor diligencie el siguiente formulario para modificar un
                                            lugar.<br><br>
                                            Recuerde que este formulario contiene campos obligatorios(*).
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Información del lugar</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="IdLugar">Id. del lugar (único)</label>
                                        <input type="text" name="IdLugar" id="IdLugar" class="form-control"
                                               value="<?php echo $lugar['IdLugar']; ?>" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label for="NombreLugar">Nombre del lugar*</label>
                                        <input type="text" name="NombreLugar" id="NombreLugar" class="form-control"
                                               value="<?php echo $lugar['NombreLugar']; ?>" autofocus required
                                               tabindex="1"/>
                                    </div>
                                    <div class="box-footer">
                                        <input type="button" class="btn btn-warning" tabindex="16"
                                               onclick="location.href='buscarLugares.php'" value="Cancelar"/>
                                        <button type="submit" class="btn btn-success pull-right" tabindex="15"
                                                value="modificar" name="modificar" id="modificar">Modificar información
                                        </button>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                        </form>
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <?php
    }
    ?>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->

        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">SIGCO</a>.</strong> All rights reserved.
    </footer>

    <!-- jQuery 2.1.4--
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
    <script type="text/javascript">
        $(document).ready(function () {

            function randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            }

            function generateCaptcha() {
                $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
            }

            generateCaptcha();
            $('#formValidacion').formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                locale: 'es_ES',

                fields: {
                    Nit: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            integer: {
                                message: 'Sólo se permite el ingreso de números.'
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'Este campo debe tener mínimo 6 carácteres y máximo 15.'
                            }
                        }
                    },
                    RazonSocial: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            stringLength: {
                                min: 6,
                                max: 50,
                                message: 'Este campo debe tener mínimo 6 carácteres y máximo 50.'
                            }
                        }
                    },
                    Direccion: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            stringLength: {
                                min: 6,
                                max: 50,
                                message: 'Este campo debe tener mínimo 6 carácteres y máximo 50.'
                            }
                        }
                    },
                    Telefono: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            integer: {
                                message: 'Sólo se permite el ingreso de números.'
                            },
                            stringLength: {
                                min: 7,
                                max: 10,
                                message: 'Este campo debe tener mínimo 7 carácteres y máximo 10.'
                            }
                        }
                    },
                    Email2: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es requerido.'
                            },
                            emailAddress: {
                                message: 'Ingrese un correo electrónico válido.'
                            }
                        }
                    },
                    IdLugar: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            }
                        }
                    },
                    IdTipo: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            }
                        }
                    },
                    IdActividad: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            }
                        }
                    },
                    Cedula: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            integer: {
                                message: 'Sólo se permite el ingreso de números.'
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'Este campo debe tener mínimo 6 carácteres y máximo 15.'
                            }
                        }
                    },
                    Nombres: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            regexp: {
                                regexp: /^[a-z\sñÑ]+$/i,
                                message: 'Solo se permiten letras'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Este campo debe tener mínimo 3 caracteres y máximo 30'
                            }
                        }
                    },
                    Apellidos: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            regexp: {
                                regexp: /^[a-z\sñÑ]+$/i,
                                message: 'Solo se permiten letras'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Este campo debe tener mínimo 3 caracteres y máximo 30'
                            }
                        }
                    },
                    Celular: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es necesario.'
                            },
                            integer: {
                                message: 'Sólo se permite el ingreso de números.'
                            },
                            stringLength: {
                                min: 7,
                                max: 10,
                                message: 'Este campo debe tener mínimo 7 carácteres y máximo 10.'
                            }
                        }
                    },
                    Email1: {
                        validators: {
                            notEmpty: {
                                message: 'Este campo es requerido.'
                            },
                            emailAddress: {
                                message: 'Ingrese un correo electrónico válido.'
                            }
                        }
                    }

                }
            });
        });
    </script>
    <!-- Page script-->
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
            $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
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
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
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
</body>
</html>