<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined("autorizare") or die("Nu aveti autorizare");
$content = '<main class="mdl-layout mdl-color--grey-100">'
        . '<div class="mdl-grid" style="height: 100%"></div>'
        . '</main>';

if (!$_user->isLogged()) {
    $email = $_POST["email"];
    $parola = hash("sha256",$_POST["parola"]);
    if (((new Users)->selectUser2($email,$parola)) !== false) {
        $_user->setSID($email, $sha256_session_id);
    } else {
        $_SESSION["Hermes_login"] = "Email sau parola incorecte!";
    }
} else {
    $_SESSION["Hermes_login"] = "Exista deja un user autentificat!";
}
redirect(getUrl("home", "home"));
