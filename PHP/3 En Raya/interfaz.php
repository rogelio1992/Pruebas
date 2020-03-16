<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div style="text-align: center;">
    <?php
    include "jugador.php";
    include "tablero.php";
    include "Controlador.php";
    include "connection.php";
    $flag=false;

    if($_REQUEST)
    {
        $tablero = new Tablero;
        $controlador = new Controlador;


        if($_POST){
            //iniciando el juego
            $jugador1 = new Jugador($_POST['n1'], $_POST['n2']);

            $_SESSION['user']=$_POST['user'];
            $_SESSION['password']=$_POST['pass'];
            $connection = new connection($_SESSION['user'],$_SESSION['password']);

            $intTable=$connection->tableExist();
            if ($intTable==0){
                $connection->createDB();
            }
            //Construyendo el tablero
            $tablero->Construir();
            //aqui va para crear el obejto de tipo connection y pasarle el user y el pass
            $turno = 1; // Comienza el jugador 1
        }else
        {

            $resultado=$controlador->Comprobar();
           // var_dump($resultado);
            //empezo el juego y se realizo la jugada
            $turno = $_GET['turno'];
            $tablero->cambiar($_GET['pos'], $turno);

            $connection = new connection($_SESSION['user'],$_SESSION['password']);
            //verificar si alguien gana y guardar el array de las jugadas en la BD
           // var_dump($connection);
            $array=$controlador->GuardarArray();
            $resultado=$controlador->Comprobar();
            if ($resultado==0){
                $flag=true;
                echo "<h2 align='center'>FELICIDADES ".$_SESSION["jugador2"]." ha ganado</h2>";
               echo '
		<table border="1" align="center">
		<tr>
			<td>'.$tablero->mostrarGanador(11, $turno).'</td>
			<td>'.$tablero->mostrarGanador(12, $turno).'</td>
			<td>'.$tablero->mostrarGanador(13, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrarGanador(21, $turno).'</td>
			<td>'.$tablero->mostrarGanador(22, $turno).'</td>
			<td>'.$tablero->mostrarGanador(23, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrarGanador(31, $turno).'</td>
			<td>'.$tablero->mostrarGanador(32, $turno).'</td>
			<td>'.$tablero->mostrarGanador(33, $turno).'</td>
		</tr>
	</table>';

                session_reset();
                $tablero->Construir();
                //$connection->deleteData();
                $connection->insertData(json_encode($array),$_SESSION["jugador1"],$_SESSION["jugador2"],$_SESSION["jugador2"]);
                }
            elseif ($resultado==1){
                $flag=true;
                echo "<h2 align='center'>FELICIDADES ".$_SESSION["jugador1"]." ha ganado</h2>";
                echo '
		<table border="1" align="center">
		<tr>
			<td>'.$tablero->mostrarGanador(11, $turno).'</td>
			<td>'.$tablero->mostrarGanador(12, $turno).'</td>
			<td>'.$tablero->mostrarGanador(13, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrarGanador(21, $turno).'</td>
			<td>'.$tablero->mostrarGanador(22, $turno).'</td>
			<td>'.$tablero->mostrarGanador(23, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrarGanador(31, $turno).'</td>
			<td>'.$tablero->mostrarGanador(32, $turno).'</td>
			<td>'.$tablero->mostrarGanador(33, $turno).'</td>
		</tr>
	</table>';

                $connection->insertData(json_encode($array),$_SESSION["jugador1"],$_SESSION["jugador2"],$_SESSION["jugador1"]);

            }
            elseif($resultado==2){
               if($controlador->Empate()==0){
                $flag=true;
                echo "<h2 align='center'>EMPATE</h2>";
                echo '
		<table border="1" align="center">
		<tr>
			<td>'.$tablero->mostrarGanador(11, $turno).'</td>
			<td>'.$tablero->mostrarGanador(12, $turno).'</td>
			<td>'.$tablero->mostrarGanador(13, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrarGanador(21, $turno).'</td>
			<td>'.$tablero->mostrarGanador(22, $turno).'</td>
			<td>'.$tablero->mostrarGanador(23, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrarGanador(31, $turno).'</td>
			<td>'.$tablero->mostrarGanador(32, $turno).'</td>
			<td>'.$tablero->mostrarGanador(33, $turno).'</td>
		</tr>
	</table>';
                   $connection->insertData(json_encode($array),$_SESSION["jugador1"],$_SESSION["jugador2"],"EMPATE");
            }

            }

        }
        if ($flag==0){

        echo "<h2>".$_SESSION["jugador1"]." vs. ".$_SESSION["jugador2"]."</h2>";
        //MOSTRAR EL TABLERO DE JUEGO
        if($turno==2){
            echo "El turno es para: ".$_SESSION["jugador2"]."<br><br>";
            $turno = 1;
        }
        else
        {
            echo "El turno es para: ".$_SESSION["jugador1"]."<br><br>";
            $turno = 2;
        }


        echo '
		<table border="1" align="center">
		<tr>
			<td>'.$tablero->mostrar(11, $turno).'</td>
			<td>'.$tablero->mostrar(12, $turno).'</td>
			<td>'.$tablero->mostrar(13, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrar(21, $turno).'</td>
			<td>'.$tablero->mostrar(22, $turno).'</td>
			<td>'.$tablero->mostrar(23, $turno).'</td>
		</tr>
		<tr>
			<td>'.$tablero->mostrar(31, $turno).'</td>
			<td>'.$tablero->mostrar(32, $turno).'</td>
			<td>'.$tablero->mostrar(33, $turno).'</td>
		</tr>
	</table>';}

        //Boton para terminar el juego y volver a comenzar
        echo '<br>
	<input type="submit" name="terminar" value="Terminar Juego" onClick="location.href=\'interfaz.php\'">
	<form name="empezar" action="interfaz.php" method="post">
	<input type="hidden" name="n1" value="'.$_SESSION["jugador1"].'">
	<input type="hidden" name="n2" value="'.$_SESSION["jugador2"].'">
	<input type="hidden" name="user" value="'.$_SESSION["user"].'">
	<input type="hidden" name="pass" value="'.$_SESSION["password"].'">
	<input type="submit" name="empezar" value="Volver a empezar"></form>';

    }
    else
    {
        //EL JUEGO AÚN NO HA INICIADO
        //MOSTRAMOS EL FORMULARIO PARA INICIAR
        $jugador1 = new Jugador("Jugador 1", "Jugador 2");

        echo "<h2>Vamos a jugar un juego de los más comunes del mundo</h2>
	Programado en PHP OOP y MYSQL<br><br>";

        echo '
	<form name="game" action="interfaz.php" method="post">
	<table border="1">
	<tr>
		<td>' .$_SESSION["jugador1"].' juega con <img width="100px" src="imagenes/x.png"></td>
		<td>'.$_SESSION["jugador2"].' juega con <img width="100px" src="imagenes/0.png"></td>
	</tr>
	<tr>
		<td>Ingrese el nombre del primer jugador:<input type="text" name="n1" size="7"></td>
		<td>Ingrese el nombre del segundo jugador:<input type="text" name="n2" size="7"></td>
	</tr>
	</table>
	<br>
	<table border="1">
	<thead>Asegurese de tener corriendo el servicio MYSQL y ponga aqui su usuario y contraseña para guardar su estado del juego</thead>
	<tr>
	<td>Ingrese su usuario de MYSQL:<input required type="text" name="user" size="10"></td>
	<td>Ingrese su contraseña:<input  type="password" name="pass" size="10"></td>
    </tr>
	</table>
	<br>
	<input type="submit" value="EMPEZAR LA PARTIDA">
	</form>';
    }

    ?>

    <br><br>

</div>
</body>
</html>