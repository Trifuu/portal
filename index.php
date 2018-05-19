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

$page = isset($_GET["page"]) ? htmlspecialchars(strip_tags($_GET["page"]), ENT_QUOTES) : "home";
$view = isset($_GET["view"]) ? htmlspecialchars(strip_tags($_GET["view"]), ENT_QUOTES) : "dashboard";

$content = null;

$js = [];
$css = [];

switch ($page):
    case "home":
        require_once _ROOT_CONTENT . "home/controller.php";
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        $content = _ROOT_CONTENT . "404.php";
        $title_app_title = "404 - Pagina Inexistenta";
        break;
endswitch;

require_once _ROOT_CONTENT . "template.php";

# -- end output buffer
ob_end_flush();
