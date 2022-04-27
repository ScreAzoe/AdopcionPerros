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
        <a  href="./index.html"><li class="navbar-letra"> Inicio </li></a> 
        <a href="./sobre_nosotros.html"><li class="navbar-letra"> Nosotros </li></a>
        <a href="./perros.php"><li class="navbar-letra active"> Adoptar </li></a> 
        <a href="./productos.php"><li class="navbar-letra "> Productos </li></a> 
        <a href="./servicios.html"><li class="navbar-letra"> Servicios </li> </a>
        <a href="./contacto.php"><li class="navbar-letra">  Contacto </li> </a>
     </ul>
    <br><br><br><br>
    <div class="contenedor">
        <div class="renglon">
            <div class="renglon-encabezado" align="center">
                <strong>
                    Ayúdanos a seguir ayudando
                </strong>
            </div>
        </div>

        <div class="renglon">
            <div class="renglon-cuerpo">
                <strong>
                    Jueguetes para el travieso de la casa
                </strong>
            </div>
        </div>
        
        <?php
            $cont= 0;
            $pdo= new PDO('mysql:host=localhost; port=3306; dbname=refugio', 'ref','123');
            $perros= $pdo->query("SELECT * FROM perros");
            while($row = $perros-> fetch(PDO::FETCH_ASSOC)){
                if($cont==0){
                    echo  "<div class='grid-producto'>";

                }
                echo"<div class='item".$row['id']." marco' id='".$row['id']."'>
                    <img  style='border-radius:50%;' class='producto' src='".$row['imagen']."'>
                    <div class='renglon-cuerpo'>
                        <p name='nombre'>".$row['nombre']."</p>
                        <p>".$row["descripcion"]."</p>
                        <a href='contacto.html'><button class='button'>Adoptar</button></a>
                    </div>
                    
                </div>";
                $cont++;
                if($cont==3){
                    $cont=0;
                    echo "</div>";
                    echo "<br><br><br>";
                }
            }
            if($cont<3){

                echo "</div>";
            }       
        ?>
        <br><br>

    
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
    <script src="productos.js"></script>

</body>
