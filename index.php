<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSES</title>
</head>
<h1>Aqui la pagina de fran</h1>
<body>
    <form action="index.php" method="POST">
    <p>Ciudad de Origen<p>
    <input id="ciudado" type="text" name="ciudado"></input>
    <p>Ciudad Destino</p>
    <input id="ciudadd" type="text" name="ciudadd"></input>
    <p>Distancia</p>
    <select id="distancia" name="distancia">
        <option value="=">=</option>
        <option value=">=">>=</option>
        <option value="<="><=</option>
    </select>
    <input id="distanciaa" type="number" name="distanciaa"></input>
    <p>Viajeros 2022</p>
    <select id="viajerosm" name="viajerosm">
        <option value="=">=</option>
        <option value=">=">>=</option>
        <option value="<="><=</option>
    </select>
    <input id="viajeros" type="number" name="viajeros"></input>
    <button type="submit">Filtrar</button>
    <br>
    <form>

    <script>    
    </script>
    <?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "bus";
    
    $conexion = new mysqli($server,$user,$pass,$db);
    $sql="SELECT * FROM rutas where 1";

    $sql2="";
    $sql3="";
    $sql4="";
    $sql5="";

    //$sql2="";
    //var_dump($resultado);

    if(isset($_POST['ciudado'])) {
        //echo isset($_POST['ciudado']);
        $cola = $_POST["ciudado"];
        if($cola==""){
            $sql2 = "";
        }else{
        $sql2 = " AND ciudadOrigen ='".$cola."'";
    }
    }
    if(isset($_POST['ciudadd'])) {    
        $cola2 = $_POST["ciudadd"];
        if($cola2==""){
            $sql3 = "";
        }else{
        $sql3 = " AND ciudadDestino ='".$cola2."'";
    }
    }
    if(isset($_POST['distanciaa'])){
        $cola3 = $_POST["distanciaa"];
        $MYM = $_POST["distancia"];
        if($cola3==""){
            $sql4 = "";
        }else{
            $sql4 = " AND distancia ".$MYM." '".$cola3."'";
            }
    }
    if(isset($_POST['viajeros'])){
        $cola4 = $_POST["viajeros"];
        $MYMM = $_POST["viajerosm"];
        if($cola4==""){
            $sql5 = "";
        }else{
            $sql5 = " AND viajeros2022 ".$MYMM." '".$cola4."'";
            }
        
    }
    //echo "simbolo".$MYM;
    echo "<br>";
    echo "esta es la consulta: ".$sql.$sql2.$sql3.$sql4.$sql5;
    $sqlfinal = $sql.$sql2.$sql3.$sql4.$sql5;
    $resultado = $conexion->query($sqlfinal);
    //var_dump($fila);
    echo("<table border=2>");
    echo("<tr><td>ciudadOrigen</td><td>ciudadDestino</td><td>distancia</td><td>viajeros2022</td>");
    echo("<br>");
    while($fila=$resultado->fetch_assoc()){
        $variable=$fila['distancia'];
        $id=$fila['viajeros2022'];
        $libro=$fila['viajeros2022'];
        echo("<tr><td>".$fila['ciudadOrigen']."</td><td>".$fila['ciudadDestino']."</td><td>".$fila['distancia']."</td><td>".$fila['viajeros2022']."</td></tr>");

    }
    echo("</table>");
    
    ?>
</body>
</html>