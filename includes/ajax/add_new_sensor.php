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
$um_list = array("Number", "Celsius", "Percent", "Kelvin");
if ($_user->isLogged()) {
    if (isset($_POST["dashboard"]) && isset($_POST["nume"]) && isset($_POST["zecimale"]) && isset($_POST["um"])) {
        if (in_array($_POST["um"], $um_list) && $_POST["zecimale"] >= 0 && $_POST["zecimale"] < 5) {
            if (in_array($_POST["dashboard"],array_column($_user->selectDashboards(), 'id'))) {
                if ($_user->selectSensor($_POST["dashboard"],$_POST["nume"]) == null) {
                    $_user->addSensor($_POST["dashboard"],$_POST["um"], $_POST["nume"], $_POST["zecimale"]);
                    echo '1'; //sucess
                } else {
                    echo 'Mai exista un Senzor cu acest nume!'; //
                }
            } else {
                echo 'Nu aveti dreptul de a adauga in acest dashboard!'; //
            }
        } else {
            echo 'Numarul de zecimale sau um gresite!'; //
        }
    } else {
        echo 'Parametri post incorecti!'; //
    }
} else {
    echo 'Nu este logat niciun user!'; //
}

ob_end_flush();
