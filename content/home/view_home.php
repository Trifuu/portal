<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */
defined("autorizare") or die("Nu aveti autorizare");

$css[] = "getmdl-select.min.css";
$js[] = "app/home/home.js";
$js[] = "getmdl-select.min.js";
$js[] = "chart.js";
$dashboards = $_user->selectAllDashboards();
$current_dashboard = isset($_POST["current_dashboard"]) ? $_POST["current_dashboard"] : 0;

if ($dashboards != null) {

    $sensors = $_user->selectSensors($dashboards[$current_dashboard]["id"]);
} else {
    $sensors = null;
}
$title_app_title = "Pagina Principala";
$content = _ROOT_CONTENT . $page . "/tmpl_home.php";

