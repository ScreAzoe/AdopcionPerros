<?php
            $pdo= new PDO('mysql:host=localhost; port=3306; dbname=refugio', 'ref','123');

            if(isset($_POST['producto'])){
                $sql = "INSERT INTO productos (producto, cantidad, total) VALUES( :producto,:cantidad, :total)";
                $cita= $pdo->prepare($sql);

                $cita->execute(array(
                    ':producto'=> $_POST['producto'],
                    ':cantidad'=> $_POST['cantidad'],
                    ':total'=> $_POST['total'],
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
           <a  href="./index.html"><li class="navbar-letra"> Inicio </li></a> 
           <a href="./sobre_nosotros.html"><li class="navbar-letra"> Nosotros </li></a>
           <a href="./perros.php"><li class="navbar-letra"> Adoptar </li></a> 
           <a href="./productos.php"><li class="navbar-letra active"> Productos </li></a> 
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
            $juguetes= $pdo->query("SELECT * FROM juguetes");
            while($row = $juguetes-> fetch(PDO::FETCH_ASSOC)){
                if($cont==0){
                    echo  "<div class='grid-producto'>";

                }
                echo"<div class='item".$row['id']." marco' id='juguete".$row['id']."'>
                    <img  style='border-radius:50%;' class='producto' src='".$row['imagen']."'>
                    <img onclick=\"actualizarCarrito('juguete".$row['id']."')\" class='carrito-img' src='img/productos/carrito.png' title='Agregar al carrito'>
                    <div class='renglon-cuerpo'>
                        <p name='nombre'>".$row['nombre']."</p>
                        <p>Precio: $ <strong name='precio'>".$row['precio']."</strong> MXN </p>
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

        <br>
        <br>
        

        <div class="renglon">
            <div class="renglon-cuerpo">
                <strong>
                    Cuida de tu amigo, como él de ti
                </strong>
            </div>
        </div>

        <?php
            $cont= 0;
            $pdo= new PDO('mysql:host=localhost; port=3306; dbname=refugio', 'ref','123');
            $juguetes= $pdo->query("SELECT * FROM articulos");
            while($row = $juguetes-> fetch(PDO::FETCH_ASSOC)){
                if($cont==0){
                    echo  "<div class='grid-producto'>";

                }
                echo "
                <div class='item".$row['id']." marco' id='art".$row['id']."'>
                    <img class='producto' src='".$row['imagen']."'>
                    <img onclick=\"actualizarCarrito('art".$row['id']."')\" class='carrito-img' src='img/productos/carrito.png' title='Agregar al carrito'>
                    <div class='renglon-cuerpo'>
                        <p name='nombre'>".$row['nombre']."</p>
                        <p>Precio: $ <strong name='precio'>".$row['precio']."</strong> MXN </p>
                    </div>
                    
                </div>
                ";
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

    <form name= "carrito" id="carritoCompras" class="container formulario" method="post">
        <table style="border: #046CDB solid; width: 100%; border-radius: 20px; ">
            <thead>
                <tr style="font-size: 2.5vw;">
                    <th> </th>
                    <th> Producto</th>
                    <th style="width: 18%;"> Precio </th>
                    <th style="width:10%"> Cant.</th>
                    <th style="width: 25%;"> Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>

            <tr style="padding-top: 30%;font-size: 2.5vw;">
                <td></td>
                <td><strong>TOTAL </strong></td>
                <td colspan="2">                    
                    $<input style="width: 60%;" class="carr-campo " type="number" name="totalGlobal" id="totalGlobal" readonly > MXN
                </td>

                <td><button id="botonPagar" type="submit" for="carrito" disabled style="font-size: 2.5vw;"> Pagar</button></td>
            </tr>


        </table>
    </form> 

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
