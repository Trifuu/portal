<?php
/*
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */


# -- start output buffer
ob_start();

define("_ROOT", getcwd() . "/");
define("autorizare", 1);

require _ROOT . "includes/config.php";

$page = isset($_GET["page"]) ? htmlspecialchars(strip_tags($_GET["page"]), ENT_QUOTES) : "before_login";
$view = isset($_GET["view"]) ? htmlspecialchars(strip_tags($_GET["view"]), ENT_QUOTES) : "login";

$pagini["view"]=array("login","login_action");
$pagini["page"]=array("register");
if (!$_user->isLogged()) {
    
}
$content = null;

$js = [];
$css = [];
if(!$_user->isLogged() && $page!="before_login"){
    $page="before_login";
    $view="login";
}
if($_user->isLogged() && $page=="before_login"){
    $page="home";
    $view="home";
}

switch ($page):
    case "home":
        require_once _ROOT_CONTENT . "home/controller.php";
        break;
    case "before_login":
        require_once _ROOT_CONTENT . "before_login/controller.php";
        break;
    case "sensor":
        require_once _ROOT_CONTENT . "sensor/controller.php";
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        $content = _ROOT_CONTENT . "404.php";
        $title_app_title = "404 - Pagina Inexistenta";
        break;
endswitch;

if ($page == "sensor") {
    require_once _ROOT_CONTENT . "template_sensor.php";
} else {
    require_once _ROOT_CONTENT . "template.php";
}
# -- end output buffer
ob_end_flush();
