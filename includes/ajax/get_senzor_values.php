<?php

ob_start();
/*
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */

define("autorizare", 1);

chdir('../../');
define("_ROOT", getcwd() . "/");
error_reporting(E_ALL);
include "includes/config.php";

if ($_user->isLogged()) {
    if (isset($_POST["id"])) {
        if (in_array($_POST["id"], array_column($_user->selectAllSensors(), 'id'))) {
            $result=$_user->selectSensorValues($_POST["id"]);
            $mesaj["valoare"]=array_column($result, 'valoare');
            $mesaj["data"]=array_column($result, 'data');
            $mesaj = json_encode($mesaj);
        } else {
            $mesaj = json_encode('Nu aveti dreptul de a vedea acest senzor!');
        }
    } else {
        $mesaj = json_encode('Parametri post incorecti!');
    }
} else {
    $mesaj = json_encode('Nu este logat niciun user!');
}
//header("Content-Type: application/json", true);
ob_end_clean();
echo $mesaj;
