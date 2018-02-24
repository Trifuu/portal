<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");

session_start();

define("_ROOT_CONTENT", _ROOT . "content/");
define("_ROOT_INCLUDES", _ROOT . "includes/");
define("_ROOT_ASSETS", _ROOT . "assets/");

require_once _ROOT_INCLUDES . "Class/Db.php";
require_once _ROOT_INCLUDES . "Class/User.php";
require_once _ROOT_INCLUDES . "Class/Users.php";
require_once _ROOT_INCLUDES . "functions.php";
require_once _ROOT_INCLUDES . "functions_users.php";


$title_app_name = "Hermes";
$title_app_separator = " - ";
$title_app_title = "Default Title";
$site = "local";

if ($site == "local") {
    define("_SITE_BASE", "http://localhost/hermes/");

    define("_SITE_CSS", _SITE_BASE . "assets/css/");
    define("_SITE_JS", _SITE_BASE . "assets/js/");

    # -- MySQL DB intialisation
    Db::initDb("Hermes", "root", "nan587","localhost");
}

$_user=new User();

# -- variable declare
$sid = session_id();
$sha256_session_id = hash("sha256", $sid);

$_user->login($sha256_session_id);