<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined("autorizare") or die("Nu aveti autorizare");


function get_logged_in_user() {
    global $db, $sid;
    try {
        $stmt = $db->prepare("select * from user where sid = :sid");
        $stmt->bindParam(':sid', $sid, PDO::PARAM_STR, 64);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    return $user === false ? null : $user;
}