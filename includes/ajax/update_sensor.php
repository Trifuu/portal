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
$tip_list = array("Număr", "Temperatură", "Luminozitate", "Umiditate");
if ($_user->isLogged()) {
    if (isset($_POST["id"]) && isset($_POST["dashboard"]) && isset($_POST["nume"]) && isset($_POST["zecimale"]) && isset($_POST["tip"])) {
        if (in_array($_POST["tip"], $tip_list) && $_POST["zecimale"] >= 0 && $_POST["zecimale"] < 5) {
            if (in_array($_POST["dashboard"],array_column($_user->selectDashboards(), 'id'))) {
                if($_user->selectSensors($_POST["dashboard"])!=null){
                    $check=$_user->selectSensor($_POST["dashboard"],$_POST["nume"]);
                    if ($check==null || $check["id"]==$_POST["id"]) {
                        $_user->updateSensor($_POST["id"],$_POST["nume"], $_POST["tip"], $_POST["zecimale"]);
                        echo '1'; //sucess
                    } else {
                        echo 'Mai exista un senzor cu acest nume!';
                    }
                }else{
                    echo 'Senzorul nu exista in dashboard-ul curent!';
                }
            } else {
                echo 'Nu aveti dreptul de a adauga in acest dashboard!'; 
            }
        } else {
            echo 'Numarul de zecimale sau um gresite!'; 
        }
    } else {
        echo 'Parametri post incorecti!'; 
    }
} else {
    echo 'Nu este logat niciun user!'; 
}

ob_end_flush();
