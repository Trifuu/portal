<?php

/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");

function getUrl($page, $view, $echo = false, $query = []) {
    $curl = _SITE_BASE . "$page/$view/";
    //$curl = _SITE_BASE . "?page=$page&view=$view";
    if (count($query)) {
        $cnt = 0;
        foreach ($query as $key => $value) {
            $curl .= ( ++$cnt == 1 ? "&" : "&") . "$key=" . urlencode($value);
        }
    }
    if ($echo) {
        echo $curl;
    } else {
        return $curl;
    }
}

function redirect($url) {
    $url = str_replace("&amp;", "&", urldecode($url));
    @header("Location: " . $url);
    die("<meta http-equiv='refresh' content='0;url=" . $url . "' /><a href='$url'>$url</a>");
}

function var_dump_custom($output) {
    echo "<pre>";
    var_dump($output);
    echo "</pre>";
}
