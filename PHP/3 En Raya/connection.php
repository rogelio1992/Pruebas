<?php
class connection
{

public $username;
public $password;

public function __construct($username,$password)
{

    $this->username = $username;
    $this->password = $password;
}

    public function createDB(){
    $servername = "localhost";
    $dbname = "game";

    $sql = "CREATE TABLE Jugadas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    jugadas VARCHAR(250),
    jugador1 VARCHAR(50),
    jugador2 VARCHAR(50),
    ganador VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $this->username ,$this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table


    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Su partida está siendo guardaba en la Base de datos game en la tabla jugadas";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
public function tableExist (){
    $servername = "localhost";
    $table= "jugadas";
    $dbname = "game";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $this->username ,$this->password);
    $tableExist = gettype($conn->exec("SELECT count(*) FROM $table")) == 'integer';
    if($tableExist==1){
        return 1;
    }
    else
        return 0;
}
public function insertData($array,$jugador1,$jugador2,$ganador){
    $servername = "localhost";
    $dbname = "game";
    $table= "jugadas";
    $sql = "INSERT INTO $table (jugadas,jugador1,jugador2,ganador)
    VALUES ('$array','$jugador1','$jugador2','$ganador')";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // use exec() because no results are returned
        $conn->exec($sql);

    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
public function deleteData (){
    $servername = "localhost";
    $dbname = "game";
    $table= "jugadas";
    $sql = "DELETE FROM $table ";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Base de datos limpiada correctamente para nuevo juego";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}


}