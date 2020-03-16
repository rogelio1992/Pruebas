<?php
class Jugador
{
    public $nombre;
    private $puntos;
    private $vidas;

    public function sumarPunto()
    {
        $this->puntos++;
    }

    public function restarPunto()
    {
        $this->puntos--;
    }

    public function __construct($nom1, $nom2)
    {
        if($nom1 == "") $nom1 = "Jugador 1";
        if($nom2 == "") $nom2 = "Jugador 2";
        $_SESSION["jugador1"] = $nom1;
        $_SESSION["jugador2"] = $nom2;
        $this->puntos = 0;
    }

    public function mostrarPuntos()
    {
        return $this->puntos;
    }

}
