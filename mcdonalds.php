<!DOCTYPE HTML>
<?php
error_reporting(0);

$registro= $_GET['registro'];
$correo= $_GET['correo'];

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if(isset($_SESSION['carro']))
    
$carro=$_SESSION['carro'];else $carro=false;

	require_once('code/connect.php');

	$id= $_SESSION['user_id'];

$consulta = mysqli_query($connect, "SELECT * FROM members WHERE id='$id'")
    or die ("Error al traer los datos");

     while ($row = mysqli_fetch_array($consulta)){

        $email=$row['email'];


     } 

     if (login_check($mysqli) == true) {
     	$iniciada=1;
     }

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'Conectado';
} else {
    $logged = 'Desconectado';
}
?>
    <html>

    <head>
        <title>McDonald's - PideloBarinas</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    </head>

    <body class="no-sidebar">
        <div id="page-wrapper">

            <!-- Header -->
            <div id="header-wrapper" style="height:360px;" class="wrapper">
                <img id="loguito" src="images/logo12.png">
                <div id="header">

                    <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li class="current"><a href="index.php">Inicio</a></li>
                            <li>
                                <a href="#">¿Como Funciona?</a>
                                <ul>
                                    <li><a href="#">Aprende a ordenar</a></li>
                                    <li><a href="#">¿Tienes un restaurante?</a></li>
                                    <li><a href="#">Preguntas Frecuentes</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Restaurantes</a></li>
                            <li><a href="registro.php">Registrate</a></li>
                            <?php if ($iniciada==1){ ?>
                            <li>
                                <a href="cuenta/index.php">
                                    <?php echo $email; ?>
                                </a>
                                <ul>
                                    <li><a href="cuenta/mis-datos.php">Modificar Mis Datos</a></li>
                                    <li><a href="includes/logout.php">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                            <?php }else{ ?>
                            <li><a href="login.php" id="button">Iniciar Sesión</a></li>
                            <?php } ?>

                        </ul>
                    </nav>

                </div>
            </div>


            <!-- Main -->
            <div style="background:url(images/restaurant.jpg); width:100%; height:350px;" class="wrapper style2">
                <div class="title" style="background:rgba(255,255,255,0.4);">
                    <p style="color:black; font-size:22px; position:relative; top:-15px;"></p><img style="width:80%; margin-top:-40px; ;" class="img-lista" src="images/01.jpg" alt="" /></div>
                <div id="main" class="container">

                    <!-- Content -->
                    <div id="content">
                        <article class="box post">
                            <header class="style1">
                                <h2 style="color:white;">
                                    <br> Status: <span style="color:green; font-weight:bolder;">Abierto (Disponible entre 10 am / 8 pm)</span>.</h2>
                                <p style="color:white;">Tiempos de entrega: 45-60 Minutos.</p>
                            </header>

                    </div>

                </div>
            </div>

            <!-- Highlights -->
            <div class="wrapper style3">
                <div class="title">Menu</div>
                <div>
                    <h1 style="text-align:center; font-size:30px; background-color:#262932; color:#E8766F; padding:10px;">Hamburguesas</h1>
                    <br><br><br><br>
                </div>
                <div id="highlights" class="container">
                    <div class="row 150%">
                        <?php 						
							$consulta2 = mysqli_query($connect, "SELECT * FROM comida WHERE restaurant='McDonalds' ")

							or die ("Error al traer los datos");

							?>
                        <?php while ($extraido2 = mysqli_fetch_array($consulta2)) { ?>

                        <style type="text/css">
                            #backgroundPopup<?php echo $extraido2['id_comida'];
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
                            
                            #popupContact<?php echo $extraido2['id_comida'];
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
                            
                            .popupContactClose<?php echo $extraido2['id_comida'];
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
                            
                            #button<?php echo $extraido2['id_comida'];
                            ?> {
                                text-align: left;
                                font-size: 13px;
                                cursor: pointer;
                                width: 100px;
                                margin: 0 auto;
                                margin-top: 10px;
                            }
                            
                            #backgroundPopup<?php echo $extraido2['id_comida'];
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
                            
                            #popupContact<?php echo $extraido2['id_comida'];
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
                            
                            .popupContactClose<?php echo $extraido2['id_comida'];
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
                            
                            #button<?php echo $extraido2['id_comida'];
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
                            var popupStatus<?php echo $extraido2['id_comida']; ?> = 0;

                            function loadPopup<?php echo $extraido2['id_comida']; ?> (ventana) {
                                if (popupStatus<?php echo $extraido2['id_comida']; ?> == 0) {
                                    $("#backgroundPopup<?php echo $extraido2['id_comida']; ?>").css({
                                        "opacity": "0.7"
                                    });
                                    $("#backgroundPopup<?php echo $extraido2['id_comida']; ?>").fadeIn("slow");
                                    $("#popupContact<?php echo $extraido2['id_comida']; ?>").fadeIn("slow");
                                    popupStatus<?php echo $extraido2['id_comida']; ?> = 1;
                                }
                            };

                            function disablePopup<?php echo $extraido2['id_comida']; ?> () {
                                if (popupStatus<?php echo $extraido2['id_comida']; ?> == 1) {
                                    $("#backgroundPopup<?php echo $extraido2['id_comida']; ?>").fadeOut("slow");
                                    $("#popupContact<?php echo $extraido2['id_comida']; ?>").fadeOut("slow");
                                    popupStatus<?php echo $extraido2['id_comida']; ?> = 0;
                                }
                            };

                            $(document).ready(function() {
                                $("#button<?php echo $extraido2['id_comida']; ?>").click(function() {
                                    loadPopup<?php echo $extraido2['id_comida']; ?> (1);
                                });
                                $(".popupContactClose<?php echo $extraido2['id_comida']; ?>").click(function() {
                                    disablePopup<?php echo $extraido2['id_comida']; ?> ();
                                });
                                $("#backgroundPopup<?php echo $extraido2['id_comida']; ?>").click(function() {
                                    disablePopup<?php echo $extraido2['id_comida']; ?> ();
                                });
                                $(document).keypress(function(e) {
                                    if (e.keyCode == 27 && popupStatus<?php echo $extraido2['id_comida']; ?> == 1) {
                                        disablePopup<?php echo $extraido2['id_comida']; ?> ();
                                    }
                                });
                            });
                        </script>
                        <div class="lista-restaurantes">
                            <section class="highlight">
                                <a><img class="img-lista" src="images/<?php echo $extraido2['imagen']; ?>" alt="" /></a>
                                <ul id="boton-ordenar" class="actions boton-ordenar">
                                    <li><a href="#" id="button<?php echo $extraido2['id_comida']; ?>" class="button style1"><span style="position:relative; left:10px;">Ordenar</span></a></li>
                                </ul>
                                <h3 style="text-align:center;">
                                    <?php echo $extraido2['comida']; ?> <br>Costo: <span style="color:black; font-size:1.7em;"><?php echo $extraido2['precio']; ?> </span>BsF</h3>

                                <div class="informacion">

                                    <p style="">
                                        <?php echo $extraido2['informacion']; ?>
                                    </p>

                                </div>

                            </section>
                        </div>

                        <div id="popupContact<?php echo $extraido2['id_comida']; ?>">
                            <a class="popupContactClose<?php echo $extraido2['id_comida']; ?>">x</a>

                            <center>
                                <img style="width:100%; max-width:150px;" class="img-lista" src="images/<?php echo $extraido2['imagen']; ?>" alt="" />
                                <h3 style="text-align:center; font-size:1.8em;">
                                    <?php echo $extraido2['comida']; ?> <br>Costo: <span style="color:red; font-size:1.7em;"><?php echo $extraido2['precio']; ?> </span>BsF</h3>
                                <p style="">
                                    <?php echo $extraido2['informacion']; ?>
                                </p>
                                <center>
                                    <form action="ordenar.php" method="POST">

                                        <input style="display:none;" name="email" value="<?php echo $email; ?>">
                                        <input style="display:none;" name="comida" value="<?php echo $extraido2['comida']; ?>">
                                        <input style="display:none;" name="img_restaurant" value="<?php echo $extraido2['img_restaurant']; ?>">
                                        <input style="display:none;" name="imagen" value="<?php echo $extraido2['imagen']; ?>">
                                        <input style="display:none;" name="restaurant" value="McDonalds">
                                        <input style="display:none;" name="precio" value="<?php echo $extraido2['precio']; ?>">

                                        <table>
                                            <h1 style="font-size:18px; color:white; font-size:26px; font-weight:bolder; text-align:center; background:black;">Adicionales:</h1>
                                            <?php 
												$comida= $extraido2['comida'];
																
												$consulta3 = mysqli_query($connect, "SELECT * FROM ingredientes WHERE restaurant='McDonalds' ORDER BY precio")

												or die ("Error al traer los datos");

												?>
                                            <?php while ($extraido3 = mysqli_fetch_array($consulta3)) { ?>


                                            <div style="display:inline-block; width:30%;" class="6u$ 12u$(small)">
                                                <input value="<?php echo $extraido3['id']; ?>" <?php if ($extraido3[ 'precio']>0){ ?>
                                                <?php }else{ ?> Checked
                                                <?php } ?>type="checkbox" id="i
                                                <?php echo $extraido3['id']; ?>" name="i[]">
                                                <label for="i<?php echo $extraido3['id']; ?>"><?php echo $extraido3['ingrediente']; ?> 
												<?php if ($extraido3['precio']>0){ ?>
												<span style="color:red;">(Costo: <?php echo $extraido3['precio']; ?> BsF).</span>
												<?php }else{ ?> 
												<span style="color:green;">(Gratis).</span>
												<?php } ?></label>
                                            </div>
                                            <?php } ?>


                                            <h1 style="font-size:18px; color:white; font-size:26px; font-weight:bolder; text-align:center; background:black;">Papas:</h1>

                                            <div style="display:inline-block; width:30%;" class="4u 12u$(small)">
                                                <input type="radio" id="demo-priority-low" name="demo-priority">
                                                <label for="demo-priority-low">Papas Pequeñas (1.400 BsF)</label>
                                            </div>
                                            <div style="display:inline-block; width:30%;" class="4u 12u$(small)">
                                                <input type="radio" id="demo-priority-normal" name="demo-priority">
                                                <label for="demo-priority-normal">Papas Medianas (2.180 BsF)</label>
                                            </div>
                                            <div style="display:inline-block; width:30%;" class="4u$ 12u(small)">
                                                <input type="radio" id="demo-priority-high" name="demo-priority">
                                                <label for="demo-priority-high">Papas Grandes (3.000 BsF)</label>
                                            </div>
                                        </table>

                                        <br>

                                        <input class="button" style="color:white;" type="submit" value="Ordenar">

                                    </form>
                                </center>

                        </div>
                        </center>
                        <div id="backgroundPopup<?php echo $extraido2['id_comida']; ?>"></div>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div id="footer-wrapper" class="wrapper">
                <div class="title">Contáctanos</div>
                <div id="footer" class="container">
                    <header class="style1">
                        <h2>¿Tienes alguna pregunta que hacernos?</h2>
                        <p>
                            A través del siguiente formulario podrás contactarte con nosotros y te responderemos en máximo 24 horas.
                        </p>
                    </header>
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
                                                <a href="#">@pidelobarinas</a><br />
                                                <a href="#">instagram.com/pidelobarinas</a><br />
                                                <a href="#">facebook.com/pidelobarinas</a>
                                            </p>
                                        </section>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="6u 12u(mobile)">
                                        <section>
                                            <h3 class="icon fa-envelope">Email</h3>
                                            <p>
                                                <a href="#">info@pidelobarinas.com.ve</a>
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
                        <li>&copy; pidelobarinas.com.ve</li>
                        <li>Diseño: <a href="#">Ronald Díaz</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Scripts -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/skel-viewport.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>

    </html>