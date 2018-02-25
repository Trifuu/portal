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

$_user->disconnect();

redirect(getUrl("before_login", "login"));