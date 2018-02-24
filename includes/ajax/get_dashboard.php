<?php

ob_start();
/*
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */

define("autorizare", 1);

chdir('../../');
define("_ROOT", getcwd() . "/");

include "includes/config.php";
if ($_user->isLogged()) {
    if (isset($_POST["dashboard"])) {
        if (in_array($_POST["dashboard"], array_column($_user->selectDashboards(), 'id'))) {
            $mesaj = json_encode($_user->selectSensors($_POST["dashboard"]));
        } else {
            $mesaj = json_encode('Nu aveti dreptul de a adauga in acest dashboard!');
        }
    } else {
        $mesaj = json_encode('Parametri post incorecti!');
    }
} else {
    $mesaj = json_encode('Nu este logat niciun user!');
}
//header("Content-Type: application/json", true);
echo $mesaj;

ob_end_flush();
