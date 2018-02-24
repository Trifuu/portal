<?php
defined("autorizare") or die("Nu aveti autorizare");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$content='<main class="mdl-layout mdl-color--grey-100" style="margin-top: -20px;">'
        . '<div class="mdl-grid" style="height: 100%"></div>'
        . '</main>';
if(isset($_POST["email"]) && isset($_POST["parola"])){

    $nume=isset($_POST["nume"])? $_POST["nume"]:"";
    $prenume=isset($_POST["prenume"])? $_POST["prenume"]:"";
    $email=$_POST["email"];
    $parola=$_POST["parola"];
    $telefon=isset($_POST["telefon"])? $_POST["telefon"]:"";
    $user=new Users();
    $exist=$user->selectUser($email);
    if(!isset($exist["id"])){
        $user->addUser($email, $parola, $nume, $prenume, $telefon, "user");
        $_SESSION["register"]=array(0,$nume,$prenume,$telefon,$email);
    }else{
        $_SESSION["register"]=array(1);
    }
}else{
    $_SESSION["register"]=array(2);
}

redirect(_SITE_BASE);