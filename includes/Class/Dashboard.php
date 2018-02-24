<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends Db{
    public function __construct() {
        parent::__construct();
    }
    public function selectAll(){
        try {
            $stmt = parent::$db->prepare("select * from Dashboard");
            $stmt->execute();
            $rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez==false? null:$rez;
    }
}