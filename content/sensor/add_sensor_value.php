<?php
/* 
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */
defined("autorizare") or die("Nu aveti autorizare");

$title_app_title = "Add value";
$value=$_GET["value"];
$_user->addSensorValue(3,$value);
$content=$value;