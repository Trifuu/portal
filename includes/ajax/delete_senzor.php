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
    if (isset($_POST["id"]) && $_POST["dashboard"]) {
        if (in_array($_POST["dashboard"], array_column($_user->selectDashboards(), 'id'))) {
            if ($_user->selectSensors($_POST["dashboard"]) != null) {
                $_user->deleteSensor($_POST["id"]);
                echo '1'; //sucess
            } else {
                echo 'Senzorul nu exista in dashboard-ul curent!';
            }
        } else {
            echo 'Nu aveti dreptul de a sterge in acest dashboard!';
        }
    } else {
        echo 'Parametri post incorecti!';
    }
} else {
    echo 'Nu este logat niciun user!';
}

ob_end_flush();
