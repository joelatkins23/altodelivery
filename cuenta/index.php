<?php
error_reporting(0);

    $registro= $_GET['registro'];
    $correo= $_GET['correo'];

    include_once '../includes/db_connect.php';
    include_once '../includes/functions.php';

    sec_session_start();

    require_once('../code/connect.php');

    $id= $_SESSION['user_id'];

    $consulta = mysqli_query($connect, "SELECT * FROM members WHERE id='$id'")
    or die ("Error al traer los datos");
     while ($row = mysqli_fetch_array($consulta)){
        $email=$row['email'];
        $cedula=$row['username'];
     } 

    $consulta2 = mysqli_query($connect, "SELECT * FROM usuario WHERE email='$email'")
    or die ("Error al traer los datos");

    while ($row = mysqli_fetch_array($consulta2)){

        $nombre=$row['nombre'];
        $id=$row['id'];
        $cedula=$row['cedula'];
        $telefono=$row['telefono'];
        $sector=$row['sector'];
        $avenida=$row['avenida'];
        $calle=$row['calle'];
        $urbanizacion=$row['urbanizacion'];
        $casa=$row['casa'];
        $fecha_registro=$row['fecha_registro'];
    }

     if (login_check($mysqli) == true){$iniciada=1;} 
?>

    <html>

    <head>
        <title>Perfil |<?php echo $email; ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="../assets/css/mainpeque.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <style type="text/css">
            #backgroundPopup {
                display: none;
                position: fixed;
                _position: absolute;
                /* necesario para internet explorer 6 */
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                background: url("images/banner.jpg");
                border: 1px solid #cecece;
                z-index: 1;
            }
            
            #popupContact {
                display: none;
                position: fixed;
                _position: fixed;
                /* necesario para internet explorer 6*/
                width: 90%;
                height: 90%;
                margin-top: 0;
                margin-left: -40%;
                top: 100px;
                left: 50%;
                background: url("images/banner.jpg");
                overflow: auto;
                /* Enable scroll if needed */
                border: 12px solid #cecece;
                z-index: 2;
                padding: 12px;
                font-size: 13px;
            }
            
            .popupContactClose {
                font-size: 14px;
                line-height: 14px;
                right: 6px;
                top: 4px;
                position: absolute;
                color: #800000;
                font-weight: 700;
                display: block;
            }
            
            #button2 {
                text-align: left;
                font-size: 13px;
                cursor: pointer;
                width: 100px;
                margin: 0 auto;
                margin-top: 10px;
            }
            
            #backgroundPopup {
                display: none;
                position: fixed;
                _position: absolute;
                /* necesario para internet explorer 6 */
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                background: #ccc;
                border: 1px solid #cecece;
                z-index: 1;
            }
            
            #popupContact {
                display: none;
                position: fixed;
                _position: fixed;
                /* necesario para internet explorer 6*/
                width: 90%;
                height: 90%;
                margin-top: 0;
                margin-left: -44%;
                top: 30px;
                left: 50%;
                background: url("../images/banner.jpg");
                border: 12px solid #cecece;
                z-index: 2;
                padding: 12px;
                font-size: 13px;
            }
            
            .popupContactClose {
                font-size: 30px;
                text-decoration: none;
                line-height: 14px;
                right: 18px;
                cursor: pointer;
                top: 14px;
                position: absolute;
                color: black;
                font-weight: 700;
                display: block;
            }
            
            #button2 {
                text-align: left;
                font-size: 13px;
                cursor: pointer;
                width: 100px;
                margin: 0 auto;
                margin-top: 10px;
            }
        </style>

        <script type="text/javascript">
            var popupStatus = 0;

            function loadPopup(ventana) {
                if (popupStatus == 0) {
                    $("#backgroundPopup").css({
                        "opacity": "0.7"
                    });
                    $("#backgroundPopup").fadeIn("slow");
                    $("#popupContact").fadeIn("slow");
                    popupStatus = 1;
                }
            };

            function disablePopup() {
                if (popupStatus == 1) {
                    $("#backgroundPopup").fadeOut("slow");
                    $("#popupContact").fadeOut("slow");
                    popupStatus = 0;
                }
            };

            $(document).ready(function() {
                $("#button").click(function() {
                    loadPopup(1);
                });
                $(".popupContactClose").click(function() {
                    disablePopup();
                });
                $("#backgroundPopup").click(function() {
                    disablePopup();
                });
                $(document).keypress(function(e) {
                    if (e.keyCode == 27 && popupStatus == 1) {
                        disablePopup();
                    }
                });
            });
        </script>



    </head>
    <?php if (login_check($mysqli) == true) :  $iniciada=1; ?>

    <body class="no-sidebar">
        <div id="page-wrapper">
            <!-- Header -->
            <div style="" id="header-wrapper" class="wrapper">

                <img id="loguito" src="../images/logo12.png">
                <div id="header">

                    <!-- Logo -->
                    <div id="logo">
                        <center>
                            <div style=" margin-top:-70px;">
                                <h2 style="color:white; font-size:24px;">Bienvenid@, <span style="color:#F7DC93;"><?php echo $nombre; ?></span>.</h2>
                                <h3 style="color:white; font-size:24px;">Número de Cédula: <span style="color:#F7DC93;"> V-<?php echo $cedula; ?></span>.</h3>
                                <h3 style="color:black; font-weight:400; font-size:24px; background: rgba(255,255,255, 0.4); border:2px solid black; border-radius:20px; width:300px; padding:5px;">Saldo Disponible: <span style="font-weight:600;color:black; font-size:1.4em;">13.500 </span>BsF.</h3>
                                <p></p>
                            </div>
                        </center>
                    </div>
                    <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li class="current"><a href="../index.php">Inicio</a></li>
                            <li>
                                <a href="#">¿Como Funciona?</a>
                                <ul>
                                    <li><a href="#">Aprende a ordenar</a></li>
                                    <li><a href="#">¿Tienes un restaurante?</a></li>
                                    <li><a href="#">Preguntas Frecuentes</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Restaurantes</a></li>
                            <li>
                                <a href="index.php">
                                    <?php echo $email; ?>
                                </a>
                                <ul>
                                    <li><a href="#">Modificar Mis Datos</a></li>
                                    <li><a href="../includes/logout.php">Cerrar Sesión</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>

                </div>
            </div>
            <div id="intro-wrapper" class="wrapper style1" style="width:60%; display:inline-block;">
                <!-- Main -->
                <center>
                    <!-- it works the same with all jquery version from 1.x to 2.x -->
                    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
                    <!-- use jssor.slider.mini.js (40KB) instead for release -->
                    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
                    <script type="text/javascript" src="../js/jssor.js"></script>
                    <script type="text/javascript" src="../js/jssor.slider.js"></script>
                    <script>
                        jQuery(document).ready(function($) {
                            var options = {
                                $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                                $AutoPlaySteps: 1, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                                $AutoPlayInterval: 0, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                                $PauseOnHover: 4, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                                $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                                $SlideEasing: $JssorEasing$.$EaseLinear, //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                                $SlideDuration: 2500, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                                $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
                                $SlideWidth: 140, //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                                //$SlideHeight: 100,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                                $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
                                $DisplayPieces: 7, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                                $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                                $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                                $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                                $DragOrientation: 1 //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                            };

                            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

                            //responsive code begin
                            //you can remove responsive code if you don't want the slider scales while window resizes
                            function ScaleSlider() {
                                var bodyWidth = document.body.clientWidth;
                                if (bodyWidth)
                                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 680));
                                else
                                    window.setTimeout(ScaleSlider, 30);
                            }
                            ScaleSlider();

                            $(window).bind("load", ScaleSlider);
                            $(window).bind("resize", ScaleSlider);
                            $(window).bind("orientationchange", ScaleSlider);
                            //responsive code end
                        });
                    </script>
                    <!-- Jssor Slider Begin -->
                    <!-- To move inline styles to css file/block, please specify a class name for each element. -->
                    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; ">

                        <!-- Loading Screen -->
                        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                                top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                        </div>

                        <!-- Slides Container -->
                        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px; height: 100px; overflow: hidden;">
                            <div>
                                <a href="../mcdonalds.php"><img u="image" alt="amazon" src="../img/logo/01.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="android" src="../img/logo/3.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="bitly" src="../img/logo/4.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="blogger" src="../img/logo/5.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="android" src="../img/logo/7.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="bitly" src="../img/logo/8.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="blogger" src="../img/logo/10.jpg" /></a>
                            </div>
                            <div>
                                <a href=""><img u="image" alt="dnn" src="../img/logo/13.jpg" /></a>
                            </div>
                            <div><img u="image" alt="drupal" src="../img/logo/14.jpg" /></div>
                            <div><img u="image" alt="ebay" src="../img/logo/16.jpg" /></div>
                            <div><img u="image" alt="facebook" src="../img/logo/19.jpg" /></div>
                            <div><img u="image" alt="google" src="../img/logo/1.png" /></div>
                            <div><img u="image" alt="ibm" src="../img/logo/6.png" /></div>
                            <div><img u="image" alt="ios" src="../img/logo/9.png" /></div>
                            <div><img u="image" alt="joomla" src="../img/logo/12.png" /></div>
                            <div><img u="image" alt="linkedin" src="../img/logo/15.png" /></div>
                            <div><img u="image" alt="mac" src="../img/logo/17.png" /></div>
                            <div><img u="image" alt="magento" src="../img/logo/18.png" /></div>
                            <div><img u="image" alt="pinterest" src="../img/logo/20.png" /></div>
                        </div>
                        <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
                    </div>
                </center>


                <!-- Jssor Slider End -->
                <br><br>



                <div class="title">Perfil</div>
                <div id="main" style="width:80%;" class="container">

                    <h1 style="text-align:center; font-size:28px;"> Últimos 3 Pedidos</h1>
                    <br>


                    <div style="background:#2E323A; padding:10px; font-size:15px; color:white;">


                        <div style="display:inline-block; width:10%; text-align:center;"># Orden</div>
                        <div style="display:inline-block; width:18%; text-align:center;">Metodo de Pago</div>
                        <div style="display:inline-block; width:15%; text-align:center;">Status</div>
                        <div style="display:inline-block; width:15%; text-align:center;">Total</div>
                        <div style="display:inline-block; width:15%; text-align:center;">Fecha</div>
                        <div style="display:inline-block; width:20%; text-align:center;">Opciones</div>

                    </div>

                    <?php 
						
                        $consulta_factura = mysqli_query($connect, "SELECT * FROM factura WHERE email='$email' ORDER BY numero_compra DESC LIMIT 3")

                        or die ("Error al traer los datos Factura");


                     ?>

            <?php while ($extraido_factura = mysqli_fetch_array($consulta_factura)) { ?>

            <style type="text/css">
                #backgroundPopup<?php echo $extraido_factura['numero_compra']; ?> {
                    display: none;
                    position: fixed;
                    _position: absolute;
                    /* necesario para internet explorer 6 */
                    height: 100%;
                    width: 100%;
                    top: 0;
                    left: 0;
                    background: #ccc;
                    border: 1px solid #cecece;
                    z-index: 1;
                }
                
                #popupContact<?php echo $extraido_factura['numero_compra'];
                ?> {
                    display: none;
                    position: fixed;
                    _position: fixed;
                    /* necesario para internet explorer 6*/
                    width: 80%;
                    height: 80%;
                    margin-top: 0;
                    margin-left: -40%;
                    top: 100px;
                    left: 50%;
                    background: #FFFFFF;
                    overflow: auto;
                    /* Enable scroll if needed */
                    border: 12px solid #cecece;
                    z-index: 2;
                    padding: 12px;
                    font-size: 13px;
                }
                
                .popupContactClose<?php echo $extraido_factura['numero_compra'];
                ?> {
                    font-size: 14px;
                    line-height: 14px;
                    right: 6px;
                    top: 4px;
                    position: absolute;
                    color: #800000;
                    font-weight: 700;
                    display: block;
                }
                
                #button<?php echo $extraido_factura['numero_compra'];
                ?> {
                    text-align: left;
                    font-size: 13px;
                    cursor: pointer;
                    width: 100px;
                    margin: 0 auto;
                    margin-top: 10px;
                }
                
                #backgroundPopup<?php echo $extraido_factura['numero_compra'];
                ?> {
                    display: none;
                    position: fixed;
                    _position: absolute;
                    /* necesario para internet explorer 6 */
                    height: 100%;
                    width: 100%;
                    top: 0;
                    left: 0;
                    background: #ccc;
                    border: 1px solid #cecece;
                    z-index: 1;
                }
                
                #popupContact<?php echo $extraido_factura['numero_compra'];
                ?> {
                    display: none;
                    position: fixed;
                    _position: fixed;
                    /* necesario para internet explorer 6*/
                    width: 80%;
                    height: 80%;
                    margin-top: 0;
                    margin-left: -40%;
                    top: 100px;
                    left: 50%;
                    background: #FFFFFF;
                    border: 12px solid #cecece;
                    z-index: 2;
                    padding: 12px;
                    font-size: 13px;
                }
                
                .popupContactClose<?php echo $extraido_factura['numero_compra'];
                ?> {
                    font-size: 30px;
                    line-height: 14px;
                    right: 6px;
                    text-decoration: none;
                    top: 4px;
                    position: absolute;
                    color: #800000;
                    font-weight: 700;
                    display: block;
                }
                
                #button<?php echo $extraido_factura['numero_compra'];
                ?> {
                    text-align: left;
                    font-size: 13px;
                    cursor: pointer;
                    width: 100px;
                    margin: 0 auto;
                    margin-top: 10px;
                }
            </style>    

                    <script type="text/javascript">
                        var popupStatus<?php echo $extraido_factura['numero_compra']; ?> = 0;

                        function loadPopup<?php echo $extraido_factura['numero_compra']; ?> (ventana) {
                            if (popupStatus<?php echo $extraido_factura['numero_compra']; ?> == 0) {
                                $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").css({
                                    "opacity": "0.7"
                                });
                                $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").fadeIn("slow");
                                $("#popupContact<?php echo $extraido_factura['numero_compra']; ?>").fadeIn("slow");
                                popupStatus<?php echo $extraido_factura['numero_compra']; ?> = 1;
                            }
                        };

                        function disablePopup<?php echo $extraido_factura['numero_compra']; ?> () {
                            if (popupStatus<?php echo $extraido_factura['numero_compra']; ?> == 1) {
                                $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").fadeOut("slow");
                                $("#popupContact<?php echo $extraido_factura['numero_compra']; ?>").fadeOut("slow");
                                popupStatus<?php echo $extraido_factura['numero_compra']; ?> = 0;
                            }
                        };

                        $(document).ready(function() {
                            $("#button<?php echo $extraido_factura['numero_compra']; ?>").click(function() {
                                loadPopup<?php echo $extraido_factura['numero_compra']; ?> (1);
                            });
                            $(".popupContactClose<?php echo $extraido_factura['numero_compra']; ?>").click(function() {
                                disablePopup<?php echo $extraido_factura['numero_compra']; ?> ();
                            });
                            $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").click(function() {
                                disablePopup<?php echo $extraido_factura['numero_compra']; ?> ();
                            });
                            $(document).keypress(function(e) {
                                if (e.keyCode == 27 && popupStatus<?php echo $extraido_factura['numero_compra']; ?> == 1) {
                                    disablePopup<?php echo $extraido_factura['numero_compra']; ?> ();
                                }
                            });
                        });
                    </script>

                    <div id="popupContact<?php echo $extraido_factura['numero_compra']; ?>">

                        <center>
                            <div style="width:80%;">

                                <div style="background:#E8766F; padding:3px; font-size:24px; color:white; font-weight:bolder; text-align:center;">Orden #
                                    <?php echo $extraido_factura['numero_compra']; ?><br> Total a pagar: <span style="font-size:26px;"> <?php echo number_format($extraido_factura['total'],2); ?></span> Bs</div>
                                <br>

                                <form action="procesar.php?<?php echo SID ?>&id=<?php echo $extraido['id']; ?>" method="post" enctype="multipart/form-data">
                                    <br>
                                    <p style="color:black; font-size:22px; margin-top:-40px;"><span style=" font-size:18px;">SÓLO TRANSFERENCIAS DEL MISMO BANCO <span style="font-weight:bolder;">(EFECTIVO AL INSTANTE)</span>.</span>
                                    </p>
                                    <p style="color:black; margin-top:-40px; font-size:18px;">
                                        Banesco - Cuenta (0134-0057-13-0571021105).<br> BOD - Cuenta (0116-0101-42-0199660700).<br> Venezuela - Cuenta (0102-0314-72-0000174855).<br> Transferencias a nombre de: Ronald Díaz<br> Cédula: 23.863.220<br> Correo:
                                        pagos@altodelivery.com.ve</p>
                                    <p style="color:black; font-size:22px;">Seleccionar el banco al cual transferiste:</p>
                                    <select style="width:100%; margin-top:-25px; color:black; text-align:center;">	
                                        <option value="banesco">Banesco</option>
                                        <option value="bod">BOD</option>
                                        <option value="venezuela">Venezuela</option>
                                    </select>
                                    <br>
                                    <br>
                                    <p style="color:black; font-size:22px; margin-top:-20px;">Monto Transferido:</p>
                                    <input style="width:60%;  margin-top:-20px;" type="text" placeholder="">
                                    <br>
                                    <br>
                                    <p style="color:black; font-size:22px; margin-top:-20px;">Número de Transferencia:</p>
                                    <input style="width:60%;  margin-top:-20px;" type="text" placeholder="">
                                    <br>
                                    <br>
                                    <div>
                                        <p style="color:black; font-size:22px; margin-top:-20px;">Capture de la transferencia:</p>
                                        <input type="file" REQUIRED name="imagen">
                                        <br> <br>
                                        <input style="color:white;" type="submit" value="Enviar Pago">
                                </form>
                                </div>
                                </form>
                            </div>
                        </center>
                        <a class="popupContactClose<?php echo $extraido_factura['numero_compra']; ?>">x</a>

                        <?php $ordenes = $extraido_factura['ordenes']; 
                            $consulta_orden = mysqli_query($connect, "SELECT * FROM orden WHERE id IN ($ordenes) ")
                                or die ("Error al traer los datos");
                         ?>
                        <center>
                            <div style="width:60%;background:#B75C58; padding:3px; color:white; font-weight:bolder; text-align:center;">
                                <div style="background:#00455E; padding:3px; color:white; font-weight:bolder; text-align:center;">Estás a punto de pagar por el siguiente pedido</div>

                                <div style="display:inline-block; width:20%; position:relative; left:px;">Restaurante</div>
                                <div style="display:inline-block; width:20%; position:relative; left:px;">Comida</div>
                                <div style="display:inline-block; width:20%; position:relative; left:px;">Precio</div>
                            </div>
                        </center>

                        <?php while ($extraido_orden = mysqli_fetch_array($consulta_orden)) { ?>
                        <center>
                            <div style="width:60%;background-color:rgba(255,255,255,0.9); font-size:14px; border-bottom:4px solid black; ">
                                <div style="display:inline-block; width:20%; text-align:center; color:black;"><img style="width:80px; position:relative; top:5px;" src="../images/<?php echo $extraido_orden['imagen']; ?>"> </div>
                                <div style="display:inline-block; width:20%; text-align:center; color:black;"><img style="width:40px; position:relative; top:0px;" src="../images/<?php echo $extraido_orden['img_restaurant']; ?>"><br>
                                    <?php echo $extraido_orden['restaurant']; ?>
                                </div>
                                <div style="display:inline-block; width:20%; text-align:center; color:black;">
                                    <?php echo $extraido_orden['comida']; ?>
                                </div>
                                <div style="display:inline-block; width:20%; text-align:center; color:black;">
                                    <?php echo $extraido_orden['total']; ?> Bs
                                </div>
                            </div>
                        </center>
                        <?php } ?>
                    </div>
                    <div id="backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>"></div>
                    <div style="background:white; padding:10px; font-size:16px;  border-bottom:2px solid black; border-style:dashed;">
                        <div style="display:inline-block; width:10%; text-align:center;color:black; font-size:26px; font-weight:bolder;">
                            <?php echo $extraido_factura['numero_compra']; ?>
                        </div>

                        <div style="display:inline-block; width:18%; text-align:center;color:black;">
                            <?php echo $extraido_factura['metodo_pago']; ?>
                        </div>
                        <div style="display:inline-block; width:15%; text-align:center;color:black; font-size:13px;">
                            <?php echo $extraido_factura['status']; ?>
                            <?php if ($extraido_factura['status']=='Pendiente'){ ?>
                            <center>
                                <a style="text-align:center;" href="#" id="button<?php echo $extraido_factura['numero_compra']; ?>">
                                    <div style="cursor:pointer; background-color:red; color:white; width:80px;">Enviar Pago</div>
                                </a>
                            </center>

                            <?php } ?>
                        </div>
                        <div style="display:inline-block; width:15%; text-align:center;color:black; font-weight:bolder;">
                            <?php echo $extraido_factura['total']; ?> Bs</div>
                        <div style="display:inline-block; width:15%; text-align:center;color:black;">
                            <?php echo $extraido_factura['fecha']; ?>
                        </div>

                        <script type="text/javascript">
                            function mostrar_factura<?php echo $extraido_factura['numero_compra']; ?> () {
                                $("#uno_factura<?php echo $extraido_factura['numero_compra']; ?>").fadeIn();
                                document.getElementById('ocultar_factura<?php echo $extraido_factura['numero_compra ']; ?>').style.display = 'block';
                                document.getElementById('mostrar_factura<?php echo $extraido_factura['numero_compra ']; ?>').style.display = 'none';


                            }

                            function ocultar_factura<?php echo $extraido_factura['numero_compra']; ?> () {
                                $("#uno_factura<?php echo $extraido_factura['numero_compra']; ?>").fadeOut();
                                document.getElementById('ocultar_factura<?php echo $extraido_factura['numero_compra ']; ?>').style.display = 'none';
                                document.getElementById('mostrar_factura<?php echo $extraido_factura['numero_compra ']; ?>').style.display = 'block';


                            }
                        </script>

                        <div style="display:inline-block; width:20%; text-align:center;color:black;">
                            <center><a name="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" type="button" value="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" onClick="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>();">
        					<div id="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" style="display:inline-block; text-decoration:none; margin-top:1px; cursor:pointer; font-size:12px; background:#FF4F4F; width:60px;">Detalles</div></a></center>

                            <center><a name="ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>" type="button" value="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" onClick="ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>();">
							<div id="ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>" style="display:none; text-decoration:none; margin-top:1px; cursor:pointer; font-size:12px; background:#FF4F4F; width:60px;">Ocultar</div></a></center>
                        </div>
                    </div>
                    <div id="uno_factura<?php echo $extraido_factura['numero_compra']; ?>" style="display:none;">
						<?php 
							$ordenes = $extraido_factura['ordenes']; 
							$consulta_orden = mysqli_query($connect, "SELECT * FROM orden WHERE id IN ($ordenes) ")
								or die ("Error al traer los datos");
							?>
                        <div style="background:#B75C58; padding:3px; color:white; font-weight:bolder; text-align:center;">
                            <div style="background:red; padding:3px; color:white; font-weight:bolder; text-align:center;">Esperando recibo de pago</div>

                            <div style="display:inline-block; width:20%; position:absolute; left:px;">Restaurante</div>
                            <div style="display:inline-block; width:20%; position:absolute; left:px;">Comida</div>
                            <div style="display:inline-block; width:20%; position:absolute; left:px;">Precio</div>
                        </div>
                        <?php while ($extraido_orden = mysqli_fetch_array($consulta_orden)) { ?>
                        <div style="background-color:rgba(255,255,255,0.9); font-size:14px; border-bottom:4px solid black; ">
                            <div style="display:inline-block; width:20%; text-align:center; color:black;"><img style="width:80px; position:relative; top:5px;" src="../images/<?php echo $extraido_orden['imagen']; ?>"> </div>
                            <div style="display:inline-block; width:20%; text-align:center; color:black;"><img style="width:40px; position:relative; top:15px;" src="../images/<?php echo $extraido_orden['img_restaurant']; ?>"><br>
                                <?php echo $extraido_orden['restaurant']; ?>
                            </div>
                            <div style="display:inline-block; width:20%; text-align:center; color:black;">
                                <?php echo $extraido_orden['comida']; ?>
                            </div>

                            <div style="display:inline-block; width:20%; text-align:center; color:black;">
                                <?php echo $extraido_orden['total']; ?> Bs</div>
                        </div>
                        <?php } ?>
                    </div>


                    <?php } ?>

                    <center>
                        <ul class="actions">
                            <li><a href="pedidos.php" class="button style3">Todos los pedidos</a></li>
                        </ul>
                    </center>




                    <br><br>
                    <!-- Content -->
                    <div id="content">

                        <header class="style1">
                            <h2 style="text-decoration:underline; font-size:26px;">Datos de Facturación<br class="mobile-hide" /></h2>
                        </header>
                        <div style="border:4px solid white; padding:20px;">
                            <center>
                                Nombre/Apellido<br> <input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $nombre; ?>">
                                <br> Telefono
                                <br><input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $telefono; ?>">
                                <br> Cédula
                                <br><input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $cedula; ?>">

                                <ul class="actions">
                                    <li><a href="#" class="button style3">Guardar Cambios</a></li>
                                </ul>

                            </center>
                        </div>

                        <br>

                        <header class="style1">
                            <h2 style="text-decoration:underline; font-size:26px;">Dirección de envío<br class="mobile-hide" /></h2>
                        </header>

                        <div style="border:4px solid white; padding:20px;">
                            <center>
                                Sector<br>
                                <select REQUIRED style="width:300px; color:black; padding:5px; text-align:center;">
								<option style="width:300px; color:black; padding:5px; text-align:center;" selected><?php echo $sector; ?></option>
								<option>Alto Barinas Sur</option>

								</select>
                                <br> Avenida
                                <br><input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $avenida; ?>">
                                <br> Calle
                                <br><input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $calle; ?>">
                                <br> Urbanizacion
                                <br><input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $urbanizacion; ?>">
                                <br> Casa
                                <br><input type="text" style="text-align:center; color:black; width:80%;" value="<?php echo $casa; ?>">

                                <ul class="actions">
                                    <li><a href="#" class="button style3">Guardar Cambios</a></li>
                                </ul>

                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div id="carrito" class="wrapper style1" style="width:40%; min-height:2115px; display:inline-block; background:gray; position:absolute; top:550px;">
                <!-- Main -->
                <div class="title" style="background:gray;">Carrito</div>
                <div id="main" style="width:90%;" class="container">
                    <!-- Content -->
                    <div id="content">
                        <?php 						
							$consultacarrito = mysqli_query($connect, "SELECT * FROM orden WHERE email='$email' AND carrito='anadido' ")
							or die ("Error al traer los datos");
							$consultacarrito2 = mysqli_query($connect, "SELECT * FROM orden WHERE email='$email' AND carrito='anadido' ")
							or die ("Error al traer los datos");
							?>

                        <div style="  margin-top:-80px; padding:20px; color:black; overflow-x: scroll; max-height:1000px;">
                            <center>

                                <?php while ($extraidocarrito2 = mysqli_fetch_array($consultacarrito2)) { ?>
                                <?php if ($extraidocarrito2){ $carrito='si'; ?>

                                <?php }else{$carrito='no'; } ?>
                                <?php  } ?>


                                <?php if ($carrito=='si'){ ?>

                                <div style="background:#00455E; padding:10px; font-size:15px; color:white; font-weight:bolder; text-align:center;">

                                    <div style="display:inline-block; width:20%; position:relative; left:-5px;">Restaurante</div>
                                    <div style="display:inline-block; width:20%; position:relative; left:-5px;">Comida</div>
                                    <div style="display:inline-block; width:20%; position:relative; left:-5px;">Total</div>
                                    <div style="display:inline-block; width:20%; position:relative; left:-5px;">Opciones</div>

                                </div>



                                <?php $total=0; ?>
                                <?php while ($extraidocarrito = mysqli_fetch_array($consultacarrito)) { ?>

                                <?php $ingredientes= $extraidocarrito['ingredientes'];

													if ($ingredientes=='') {$ingredientes='0';}
													
													$consulta_ingredientes = mysqli_query($connect, "SELECT * FROM ingredientes 
														WHERE id IN ($ingredientes) ORDER BY precio ") 
													or die ("Error al traer los datos");

													 ?>



                                <div style="background:white; padding:10px; font-size:16px;  border-bottom:2px solid black; border-style:dashed;">
                                    <div style="display:inline-block; width:19%; position:relative; left:-5px;">
                                        <?php echo $extraidocarrito['restaurant']; ?>
                                    </div>
                                    <div style="display:inline-block; width:19%; position:relative; left:-5px;">
                                        <?php echo $extraidocarrito['comida']; ?>
                                    </div>
                                    <div style="display:inline-block; width:19%; position:relative; left:-5px;">
                                        <?php echo number_format($extraidocarrito['total']); ?>
                                    </div>


                                    <script type="text/javascript">
                                        function mostrar<?php echo $extraidocarrito['id']; ?> () {
                                            $("#uno<?php echo $extraidocarrito['id']; ?>").fadeIn();
                                            document.getElementById('ocultar<?php echo $extraidocarrito['id']; ?>').style.display = 'block';
                                            document.getElementById('mostrar<?php echo $extraidocarrito['id']; ?>').style.display = 'none';


                                        }

                                        function ocultar<?php echo $extraidocarrito['id']; ?> () {
                                            $("#uno<?php echo $extraidocarrito['id']; ?>").fadeOut();
                                            document.getElementById('ocultar<?php echo $extraidocarrito['id']; ?>').style.display = 'none';
                                            document.getElementById('mostrar<?php echo $extraidocarrito['id']; ?>').style.display = 'block';


                                        }
                                    </script>

                                    <div style="display:inline-block; width:19%; position:relative; left:10px;">
                                        <a onclick="return confirmEliminar()" href="eliminar-carrito.php?orden=<?php echo $extraidocarrito['orden'];?>">
                                            <div style="display:inline-block; font-size:12px; background:#FF4F4F; width:60px;">Eliminar</div>
                                        </a>

                                        <?php if ($ingredientes!='0'){ ?>

                                        <a name="mostrar<?php echo $extraidocarrito['id']; ?>" type="button" value="mostrar<?php echo $extraidocarrito['id']; ?>" onClick="mostrar<?php echo $extraidocarrito['id']; ?>();">
                                        <div id="mostrar<?php echo $extraidocarrito['id']; ?>" style="display:inline-block; text-decoration:none; margin-top:1px; cursor:pointer; font-size:12px; background:#FF4F4F; width:60px;">Detalles</div></a>

                                        <a name="ocultar<?php echo $extraidocarrito['id']; ?>" type="button" value="mostrar<?php echo $extraidocarrito['id']; ?>" onClick="ocultar<?php echo $extraidocarrito['id']; ?>();">
                                        <div id="ocultar<?php echo $extraidocarrito['id']; ?>" style="display:none; text-decoration:none; margin-top:1px; cursor:pointer; font-size:12px; background:#FF4F4F; width:60px;">Ocultar</div></a>

                                        <?php } ?>
                                    </div>

                                </div>



                                <?php if ($ingredientes!=''){ ?>



                                <?php if ($ingredientes!='0'){ ?>

                                <div id="uno<?php echo $extraidocarrito['id']; ?>" style="display:none;">

                                    <div style="background:#B75C58; padding:10px; color:white; font-weight:bolder; text-align:center;">
                                        <div style="display:inline-block; width:40%;">Adicionales</div>
                                        <div style="display:inline-block; width:40%;">Precio</div>
                                    </div>

                                    <div style="background-color:rgba(255,255,255,0.9); font-size:14px; border-bottom:4px solid black; ">
                                        <?php

													while ($extraido_ingredientes = mysqli_fetch_array($consulta_ingredientes)) { ?>


                                            <div style="display:inline-block; width:40%;">
                                                <?php echo $extraido_ingredientes['ingrediente']; ?>
                                            </div>
                                            <div style="display:inline-block; width:40%;">
                                                <?php if ($extraido_ingredientes['precio']==0){$precio='Gratis';}else{$precio=$extraido_ingredientes['precio'];} ?>
                                                <?php echo $precio; ?>
                                            </div>





                                            <?php  } ?>

                                    </div>
                                </div>

                                <?php } ?>

                                <?php $total += $extraidocarrito['total']; ?>

                                <?php 
                                    $id_comidas[] = array(
                                    'id' => $extraidocarrito['id']);
                                ?>

                                <?php  }?>
                                <?php } ?>
                                <?php 											
                                    $delivery = 1800;
                                    $total= $total+$delivery; ?>
                                <br>

                                <div id="envio" style="font-weight:bolder; font-size:22px;">
                                    <div style="display:inline-block; width:40%;"><img style="width:75px; position:relative; left:-8px;" src="../images/moto.png"><br>Delivery:</div>
                                    <div style="display:inline-block; width:40%;">1,800 Bs</div>
                                </div>

                                <br>

                                <div id="total" style="font-weight:bolder; font-size:22px;">
                                    <div style="display:inline-block; width:40%;">Total:</div>
                                    <div style="display:inline-block; width:40%;">
                                        <?php echo  number_format($total); ?> Bs</div>
                                </div>
                                <br>
                                <center>
                                    <br>
                                    <ul class="actions" style="margin-top:-0px;">
                                        <li><a href="#" class="button style3 big" id="button" style="background-color:#0D6F99;">Comprar</a></li>
                                    </ul>
                                </center>
                                <?php }else{ ?> El carrito está vacío
                                <?php } ?>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div id="popupContact">
                <a class="popupContactClose">x</a>
                <div class="modal-body3">
                    <center>
                        <div class="inner">
                            <?php 
                                $consultacarrito3 = mysqli_query($connect, "SELECT * FROM orden WHERE email='$email' AND carrito='anadido' ")
                                or die ("Error al traer los datos");
                            ?>
                            <center>
                                <h2 style="color:white; margin-top:0px; font-size:24px; margin-bottom:10px; background-color:#E5756E; ">Verifica tú compra.</h2>
                            </center>

                            <div style="border-top:2px solid black;" class="box">

                                <div style="background-color: rgba(255, 255, 255, 0.4); padding:10px; color:white; font-size:20px;">
                                    <table>
                                        <tr>
                                            <th style="font-size:18px; font-weight:600; background-color:#E8766F; color:white;"></th>
                                            <th style="font-size:18px; font-weight:600; background-color:#E8766F; color:white;">Restaurant</th>
                                            <th style="font-size:18px; font-weight:600; background-color:#E8766F; width:300px; color:white;">Comida</th>
                                            <th style="font-size:18px; font-weight:600; background-color:#E8766F; color:white;">Precio</th>
                                        </tr>

                                        <tbody>
                                            <?php $total=0; ?>
                                            <?php while ($extraidocarrito3 = mysqli_fetch_array($consultacarrito3)) { ?>
                                            <tr>
                                                <td style="width:100px;"><img style="width:100px;  position:relative; top:20px;" src="../images/<?php echo $extraidocarrito3['imagen']; ?>"></td>
                                                <td style="font-size:14px; color:black; font-weight:bolder; font-size:16px; display:none;">
                                                    <?php echo $extraidocarrito3['id']; ?>
                                                </td>

                                                <td style="font-size:14px; color:black; font-weight:bolder; font-size:16px; position:relative;"><img style="width:50px;" src="../images/<?php echo $extraidocarrito3['img_restaurant']; ?>"><br>
                                                    <?php echo $extraidocarrito3['restaurant']; ?>
                                                </td>
                                                <td style="font-size:14px; color:black; font-weight:bolder; font-size:16px;">
                                                    <?php echo $extraidocarrito3['comida']; ?>
                                                </td>
                                                <td style="font-size:14px; color:#002633; font-weight:bolder; font-size:26px;">
                                                    <?php echo number_format($extraidocarrito3['total']); ?>
                                                </td>
                                            </tr>

                                            <?php $total += $extraidocarrito3['total']; ?>

                                            <?php 
                                                $id_comidas[] = array(
                                                'id' => $extraidocarrito3['id']);
                                            ?>
                                            <?php  } ?>

                                            <?php
											$delivery = 1800;
											$total= $total+$delivery; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td style="color:black; font-size:22px; font-weight:bolder;" colspan="2"><img style="width:75px; position:relative; left:-8px;" src="../images/moto.png"><br>Delivery:</td>
                                                <td style="color:#002633; font-weight:bolder; font-size:26px;">1,800 Bs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="color:black; font-size:22px; width:100px; font-weight:bolder;" colspan="2">Total</td>
                                                <td style="color:#002633; font-weight:bolder; font-size:26px; width:400px;">
                                                    <?php echo  number_format($total); ?> Bs</td>

                                            </tr>
                                        </tfoot>

                                    </table>




                                    <form method="post" action="pagar.php">

                                        <input style="color:black; display:none;" type="text" name="id_comida" value="<?php $i = 0;
                                        foreach ($id_comidas as $extraidocarrito){
                                        $i++;
                                            echo $extraidocarrito['id'].' ';
                                        }?>">
                                        <input style="color:black; display:none;" type="text" name="comidas" value="<?php 
                                        $i = 0;
                                            foreach ($id_comidas as $extraidocarrito){
                                            $i++;}
										echo $i;?>">
                                        <input style="color:black; display:none;" type="text" name="numero_compra" value="<?php echo $numero_compra; ?>">
                                        <input style="color:black; display:none;" type="text" name="email" value="<?php echo $email; ?>">
                                        <input style="color:black; display:none;" type="text" name="total" value="<?php echo $total; ?>">
                                        <br>
                                        <h1 style="color:black;">Forma de Pago</h1>
                                        <select name="metodo_pago" style="width:60%; color:black;">
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Transferencia">Transferencia</option>
                                            <option value="TDC">Tarjeta de Crédito</option>
                                        </select>
                                        <br>
                                        <input style="color:white;" value="Pagar" type="submit">
                                    </form>
                                </div>

                            </center>
                        </div>
                    </div>

                    <div id="backgroundPopup"></div>

                    <!-- Footer -->
                    <div id="footer-wrapper" class="wrapper">
                        <div class="title">Contáctanos</div>
                        <div id="footer" class="container">
                            <header class="style1" style="position:relative; top:50px;">
                                <h2>¿Tienes alguna pregunta que hacernos?</h2>
                                <p>
                                    A través del siguiente formulario podrás contactarte con nosotros y te responderemos en máximo 24 horas.
                                </p>
                            </header>

                            <center><img style="max-width:200px; position:relative; top:100px;" src="../images/logo12.png"></center>
                            <hr />
                            <div class="row 150%">
                                <div class="6u 12u(mobile)">

                                    <!-- Contact Form -->
                                    <section>

                                        <form method="post" action="#">
                                            <div class="row 50%">
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="name" id="contact-name" placeholder="Nombre" />
                                                </div>
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="email" id="contact-email" placeholder="Correo" />
                                                </div>
                                            </div>
                                            <div class="row 50%">
                                                <div class="12u">
                                                    <textarea name="message" id="contact-message" placeholder="Mensaje" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="12u">
                                                    <ul class="actions">
                                                        <li><input type="submit" class="style1" value="Enviar" /></li>
                                                        <li><input type="reset" class="style2" value="Resetear" /></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </section>

                                </div>
                                <div class="6u 12u(mobile)">

                                    <!-- Contact -->
                                    <section class="feature-list small">
                                        <div class="row">
                                            <div class="6u 12u(mobile)">
                                                <section>
                                                    <h3 class="icon fa-home">Dirección</h3>
                                                    <p>
                                                        Urb. Jardines de Alto Barinas<br /> Conj. Karuachi<br /> Barinas, Venezuela.
                                                    </p>
                                                </section>
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <section>
                                                    <h3 class="icon fa-comment">Social</h3>
                                                    <p>
                                                        <a href="#">@AltoDelivery</a><br />
                                                        <a href="#">instagram.com/AltoDelivery</a><br />
                                                        <a href="#">facebook.com/AltoDelivery</a>
                                                    </p>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="6u 12u(mobile)">
                                                <section>
                                                    <h3 class="icon fa-envelope">Email</h3>
                                                    <p>
                                                        <a href="#">info@AltoDelivery.com.ve</a>
                                                    </p>
                                                </section>
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <section>
                                                    <h3 class="icon fa-phone">Telefono</h3>
                                                    <p>
                                                        (414) 514-2165
                                                    </p>
                                                </section>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                            <hr />
                        </div>
                        <div id="copyright">
                            <ul>
                                <li>&copy; AltoDelivery.com.ve</li>
                                <li>Diseño: <a href="#">Ronald Díaz</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Scripts -->

                <script src="../assets/js/jquery.min.js"></script>
                <script src="../assets/js/jquery.dropotron.min.js"></script>
                <script src="../assets/js/skel.min.js"></script>
                <script src="../assets/js/skel-viewport.min.js"></script>
                <script src="../assets/js/util.js"></script>
                <!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
                <script src="../assets/js/main.js"></script>

                <?php else : ?>
                <p>
                    <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
                </p>
                <?php endif; ?>

    </body>

	</html>