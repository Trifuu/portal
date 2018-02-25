<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */
defined("autorizare") or die("Nu aveti autorizare");

$css[] = "getmdl-select.min.css";
$css[] = "codemirror.css";
$js[] = "app/home/home.js";
$js[] = "getmdl-select.min.js";
$js[] = "chart.js";
$js[] = "codemirror.js";
$dashboards = $_user->selectAllDashboards();
$current_dashboard = isset($_POST["current_dashboard"]) ? $_POST["current_dashboard"] : 0;

if ($dashboards != null) {
    //toate detaliile de la senzorii din current_dashboard
    $sensors = $_user->selectSensors($dashboards[$current_dashboard]["id"]);
    //sortare dupa campul pozitie
    usort($sensors,function($a,$b){return $a["pozitie"]>$b["pozitie"];});
    //aici iau ultimele valori ale fiecarui senzor
    $values=$_user->getLastSensorValue($dashboards[$current_dashboard]["id"]);
    if($values!=null){
        //sortare dupa campul pozitie
        usort($values,function($a,$b){return $a["pozitie"]>$b["pozitie"];});
    }
    for($i=0,$k=0;$i<count($sensors);$i++){
        if($sensors[$i]["pozitie"]==$values[$k]["pozitie"]){
            $sensors[$i]["valoare"]=$values[$k]["valoare"];
            $k++;
        }else{
            $sensors[$i]["valoare"]="";
        }
    }
    
} else {
    $sensors = null;
}
$title_app_title = "Pagina Principala";
$content = _ROOT_CONTENT . $page . "/tmpl_home.php";

