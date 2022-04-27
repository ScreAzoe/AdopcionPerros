<?php
            echo "<h1>PEDIDOS</h1>";
            $pdo= new PDO('mysql:host=localhost; port=3306; dbname=refugio', 'ref','123');
            $perros= $pdo->query("SELECT * FROM productos");
            while($row = $perros-> fetch(PDO::FETCH_ASSOC)){
                print_r($row);
                echo "<br>";
            }       
?>


<?php
            echo "<h1>CITAS</h1>";
            $pdo= new PDO('mysql:host=localhost; port=3306; dbname=refugio', 'ref','123');
            $perros= $pdo->query("SELECT * FROM citas");
            while($row = $perros-> fetch(PDO::FETCH_ASSOC)){
                print_r($row);
                echo "<br>";
            }       
?>