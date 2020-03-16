<?php
class Controlador
{
    public function Comprobar()
    {
            //Comprobar si el jugador 2 ha ganado
        if ($_SESSION["pos11"] == 1 && $_SESSION["pos12"] == 1 && $_SESSION["pos13"] == 1 ||
            $_SESSION["pos21"] == 1 && $_SESSION["pos22"] == 1 && $_SESSION["pos23"]== 1  ||
            $_SESSION["pos31"] == 1 && $_SESSION["pos32"] == 1 && $_SESSION["pos33"] == 1 ||
            $_SESSION["pos11"] == 1 && $_SESSION["pos21"] == 1 && $_SESSION["pos31"] == 1 ||
            $_SESSION["pos12"] == 1 && $_SESSION["pos22"] == 1 && $_SESSION["pos32"] == 1 ||
            $_SESSION["pos13"] == 1 && $_SESSION["pos23"] == 1 && $_SESSION["pos33"] == 1 ||
            $_SESSION["pos13"] == 1 && $_SESSION["pos22"] == 1 && $_SESSION["pos31"] == 1 ||
            $_SESSION["pos11"] == 1 && $_SESSION["pos22"] == 1 && $_SESSION["pos33"] == 1
        )

                return 0;
            //Comprobar si el jugador 1 ha ganado
        else if ($_SESSION["pos11"] == 2 && $_SESSION["pos12"] == 2 && $_SESSION["pos13"] == 2 ||
                $_SESSION["pos21"] == 2 && $_SESSION["pos22"] == 2 && $_SESSION["pos23"]== 2  ||
                $_SESSION["pos31"] == 2 && $_SESSION["pos32"] == 2 && $_SESSION["pos33"] == 2 ||
                 $_SESSION["pos11"] == 2 && $_SESSION["pos21"] == 2 && $_SESSION["pos31"] == 2 ||
                $_SESSION["pos12"] == 2 && $_SESSION["pos22"] == 2 && $_SESSION["pos32"] == 2 ||
                $_SESSION["pos13"] == 2 && $_SESSION["pos23"] == 2 && $_SESSION["pos33"] == 2 ||
                $_SESSION["pos13"] == 2 && $_SESSION["pos22"] == 2 && $_SESSION["pos31"] == 2 ||
                $_SESSION["pos11"] == 2 && $_SESSION["pos22"] == 2 && $_SESSION["pos33"] == 2

        )
            return 1;
        else
        return 2;

        }
    public function GuardarArray (){
        for ($i=1;$i<4;$i++){
            for ($j=1;$j<4;$j++){
                $miArray["pos$i$j"]=$_SESSION["pos$i$j"];
            }
        }

        return $miArray;
    }
    public function Empate (){
        $flag=false;
        $array= $this->GuardarArray();
        //var_dump($array);
        for ($i=1;$i<4;$i++){
            for ($j=1;$j<4;$j++){
                if($array["pos$i$j"]==0){

                    $flag=true;
                }

            }}
        return $flag;

    }


}