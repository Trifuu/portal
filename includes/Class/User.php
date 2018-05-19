<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends Db {

    private $logged;
    private $id;
    private $nume;
    private $prenume;
    private $email;
    private $parola;
    private $telefon;
    private $tip;

    public function __construct() {
        $this->logged = false;
        $this->id = -1;
        $this->nume = "";
        $this->prenume = "";
        $this->email = "";
        $this->parola = "";
        $this->telefon = "";
        $this->tip = "neautorizat";
    }

    public function isLogged() {
        return $this->logged;
    }

    public function setUser($id, $nume, $prenume, $email, $parola, $telefon, $tip, $logged = false) {
        $this->logged = $logged;
        $this->id = $id;
        $this->nume = $nume;
        $this->prenume = $prenume;
        $this->email = $email;
        $this->parola = $parola;
        $this->telefon = $telefon;
        $this->tip = $tip;
    }

    public function setSID($email, $sid) {
        try {
            $stmt = parent::$db->prepare("update Users set sid=:sid where email=:email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR, 64);
            $stmt->bindParam(":sid", $sid, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function login($sid) {

        $user = (new Users)->findSID($sid);
        if ($user !== false) {
            $this->setUser($user["id"], $user["nume"], $user["prenume"], $user["email"], $user["parola"], $user["telefon"], $user["tip"], true);
            return true;
        }
        return false;
    }

    public function setInformation($email) {
        $info = (new Users())->selectUser($email);
        $this->setUser($info["id"], $info["nume"], $info["prenume"], $info["email"], $info["parola"], $info["telefon"], $info["tip"], "true");
    }

    public function disconnect() {
        try {
            $stmt = parent::$db->prepare("update Users set sid=0 where email=:email");
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR, 64);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
