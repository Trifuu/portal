<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Db{
    public static $db;
    
    public function __construct() {
    }
    public static function initDb($dbname,$user,$password,$server) {
        try {
            self::$db = new PDO("mysql:host=".$server.";dbname=".$dbname,$user , $password);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("A aparut o eroare (verifica user/parola/host pentru MySQL):<br>" . $ex->getMessage());
        }
    }
    
}