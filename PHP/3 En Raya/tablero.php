<?php
class Tablero
{

    public function Construir(){
        $_SESSION['pos11'] = 0;
        $_SESSION['pos12'] = 0;
        $_SESSION['pos13'] = 0;
        $_SESSION['pos21'] = 0;
        $_SESSION['pos22'] = 0;
        $_SESSION['pos23'] = 0;
        $_SESSION['pos31'] = 0;
        $_SESSION['pos32'] = 0;
        $_SESSION['pos33'] = 0;
    }

    public function mostrar($posicion, $turno){
        $valor = 0;

        switch ($posicion) {
            case '11':
                $valor = $_SESSION['pos11'];
                break;
            case '12':
                $valor = $_SESSION['pos12'];
                break;
            case '13':
                $valor = $_SESSION['pos13'];
                break;
            case '21':
                $valor = $_SESSION['pos21'];
                break;
            case '22':
                $valor = $_SESSION['pos22'];
                break;
            case '23':
                $valor = $_SESSION['pos23'];
                break;
            case '31':
                $valor = $_SESSION['pos31'];
                break;
            case '32':
                $valor = $_SESSION['pos32'];
                break;
            case '33':
                $valor = $_SESSION['pos33'];
                break;
            default:
                $valor = 0;
                break;
        }

        switch ($valor) {
            case 1:
                return "<img width='100px' src=\"imagenes/0.png\" />";
                break;
            case 2:
                return "<img width='100px' src=\"imagenes/x.png\" />";
                break;
            default:
                return "<a href=\"interfaz.php?pos=".$posicion."&turno=".$turno."\"><img width='100px' src=\"imagenes/_.png\" /></a>";
                break;
        }

    }
    public function mostrarGanador($posicion, $turno){
        $valor = 0;
        switch ($posicion) {
            case '11':
                $valor = $_SESSION['pos11'];
                break;
            case '12':
                $valor = $_SESSION['pos12'];
                break;
            case '13':
                $valor = $_SESSION['pos13'];
                break;
            case '21':
                $valor = $_SESSION['pos21'];
                break;
            case '22':
                $valor = $_SESSION['pos22'];
                break;
            case '23':
                $valor = $_SESSION['pos23'];
                break;
            case '31':
                $valor = $_SESSION['pos31'];
                break;
            case '32':
                $valor = $_SESSION['pos32'];
                break;
            case '33':
                $valor = $_SESSION['pos33'];
                break;
            default:
                $valor = 0;
                break;
        }

        switch ($valor) {
            case 1:
                return "<img width='100px' src=\"imagenes/0.png\" />";
                break;
            case 2:
                return "<img width='100px' src=\"imagenes/x.png\" />";
                break;
            default:
                return "<img width='100px' src=\"imagenes/_.png\" />";
                break;
        }
    }
    public function cambiar($posicion, $jugador){
        switch ($posicion) {
            case '11':
                $_SESSION['pos11'] = $jugador;
                break;
            case '12':
                $_SESSION['pos12'] = $jugador;
                break;
            case '13':
                $_SESSION['pos13'] = $jugador;
                break;
            case '21':
                $_SESSION['pos21'] = $jugador;
                break;
            case '22':
                $_SESSION['pos22'] = $jugador;
                break;
            case '23':
                $_SESSION['pos23'] = $jugador;
                break;
            case '31':
                $_SESSION['pos31'] = $jugador;
                break;
            case '32':
                $_SESSION['pos32'] = $jugador;
                break;
            case '33':
                $_SESSION['pos33'] = $jugador;
                break;
            default:
                break;
        }
    }
}
