<?php
            $pdo= new PDO('mysql:host=localhost; port=3306; dbname=refugio', 'ref','123');

            if(isset($_POST['nombre'])){
                $sql = "INSERT INTO citas (nombre, apellido, correo, telefono,cita, info, asunto) VALUES( :nombre,:apellido, :correo, :telefono, :cita, :info, :asunto)";

                $cita= $pdo->prepare($sql);

                $cita->execute(array(
 
                    ':nombre'=> $_POST['nombre'],
                    ':apellido'=> $_POST['apellido'],
                    ':correo' => $_POST['correo'],
                    ':telefono'=> $_POST['tel'],
                    ':cita'=> $_POST['date'],
                    ':info'=> $_POST['mas-info'],
                    ':asunto'=> $_POST['asunto']
                ));
            }
?>    
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Refugio para Perros</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Dawning of a New Day' rel='stylesheet'>
    
</head>



<body>

        <ul class="navbar" >
        <a  href="./index.html"><li class="navbar-letra "> Inicio </li></a> 
        <a href="./sobre_nosotros.html"><li class="navbar-letra"> Nosotros </li></a>
        <a href="./perros.php"><li class="navbar-letra"> Adoptar </li></a> 
        <a href="./productos.php"><li class="navbar-letra"> Productos </li></a> 
        <a href="./servicios.html"><li class="navbar-letra"> Servicios </li> </a>
        <a href="./contacto.php"><li class="navbar-letra active">  Contacto </li> </a>
     </ul>
     <br><br><br>

    <div class="contenedor">
        <div class="renglon">
            <div class="tarjeta" style="border: none;">
                <div class="tarjeta-info">
                    <div class="renglon-cuerpo">
                        <strong>¡Contáctanos!</strong>
                    </div>
                    <div >
                        <p>
                            Escríbenos o visitanos, pero te recomendamos hacer una cita
                            para que nuestros amigos se preparen para verte
                        </p>
                    </div>
                    <div class="renglon">
                        <img class="ico" src="img/contacto/correo.png"> &nbsp; &nbsp; nombreRefugio@gmail.com 

                    </div>
                    <div class="renglon">
                        <img class="ico" src="img/contacto/ubicacion.png"> &nbsp; &nbsp;  Av. Siempre Viva 123, Springfield
                    </div>
                    <div class="renglon">
                        <img class="ico" src="img/contacto/tel.png">&nbsp; &nbsp;  55-12-37-89-45

                    </div>
                </div>
                <div class="tarjeta-info marco" style="text-align-last: left;">
                    <div class=" renglon renglon-encabezado">
                        <strong>¿Qué es lo que necesitas?</strong>
                    </div>
                    <div style="padding-left: 15px;">
                        Escríbenos
                    </div>
                    <form class="formulario" method="post">
                        <div class="form-grupo" style="display:grid; grid-template-columns: 50% 50%; column-gap: 10%;">
                            <div class="item1">
                                <label for="nombre">Nombre</label>
                                <br>
                                <input class="form-entrada" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="item2">
                                <label for="apellido">Apellido</label>
                                <br>
                                <input class="form-entrada" name="apellido" placeholder="Apellido">
                            </div>
                        </div>
                        
                        <div class="form-grupo">
                            <label for="correo">Correo Electrónico</label>
                            <br>
                            <input class="form-entrada" name="correo" type="email" placeholder="correo@ejemplo.com">
                        </div>

                        <div class="form-grupo" style="display:grid; grid-template-columns: 50% 50%; column-gap: 10%;">
                            <div class="item1">
                                <label for="tel">Teléfono</label>
                                <br>
                                <input class="form-entrada" name="tel" placeholder="01-(LADA)-123456789">
                            </div>
                            <div class="item2">
                                <label for="asunto">Asunto</label>
                                <br>
                                <select name="asunto" class="form-entrada">
                                    <option value="0">Adiestramento</option>
                                    <option  value="0">Estética</option>
                                    <option value="1">Adpotar</option>
                                    <option value="2">Dar en adopción</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-grupo">
                            <label for="date">Agenda tu cita</label>
                            <input class="form-entrada" name="date" type="date">
                        </div>

                        <div class="form-grupo">
                            <label for="mas-info">Cuéntanos más: </label>
                            <br>
                            <textarea  class="form-entrada" name="mas-info" >¡Detállanos tu necesidad!</textarea>
                        </div>
                        <button type="submmit" class="button">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <footer>
            <div class="grid-container" align="center">
                <div class="item1">
                    Mapa del sitio
                    <ul style="list-style-type:none" align="center">
                        <li><a href="index.html">Inicio</a></li>   
                        <li><a href="sobre_nosotros.html">Nosotros</a></li>
                        <li><a href="productos.html">Productos</a></li>
                        <li><a href="servicios.html">Servicios</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>
                <div class="item2">
                     Síguenos en nuestras redes sociales
                     <p></p>
                     <a href="http://www.facebook.com" target="blank" ><img  class="ico" src="img/fb.png" alt="Nuestro Facebook"></a>
                     <a href="http://www.instagram.com" target="blank"><img class="ico"  src="img/ig.jpg" alt="Nuestro Instagram"> </a>
                     <a href="http://www.twitter.com" target="blank"><img class="ico" src="img/twitter.png" alt="Nuestro Twitter"></a>
      
                 </div>
                 <div class="item3">
                     nombreRefugio
                     <p></p>
                     <img class="logo" src="img/logo.png">
                 </div>
            </div>
    </footer>
</body>