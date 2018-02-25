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

if($_user->isLogged()){
    if(isset($_POST["nume"]) && isset($_POST["tip"])){
        if($_POST["tip"]=="Public" || $_POST["tip"]=="Privat"){
            $_POST["tip"][0]='p';
            if($_user->selectDashboard($_POST["nume"])==null){
                $_user->addDashboard($_POST["nume"],$_POST["tip"]);
                echo '1'; //sucess
            }else{
                echo 'Mai exista un dashboard cu acest nume!'; //
            }
        }else{
            echo 'Tip de dashboard incorect!'; //
        }
    }else{
        echo 'Parametri post incorecti!'; //
    }
}else{
    echo 'Nu este logat niciun user!'; //
}

ob_end_flush();