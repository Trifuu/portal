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

if (!isset($_POST["db"]) && !isset($_POST["query"])) {
    echo "eroare";
} else {

    $db = $_POST["db"];
    $query = $_POST["query"];
    echo maxInflux($db, $query);
}

ob_end_flush();
