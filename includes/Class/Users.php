<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends Db {

    public function __construct() {
        parent::__construct();
    }

    public function addUser($email, $parola, $nume, $prenume, $telefon, $tip) {
        $parola = hash('sha256', $parola);
        try {
            $stmt = parent::$db->prepare("
                insert into `Users`
                    (`email`, `parola`, `nume`, `prenume`, `telefon`, `tip`) 
                VALUES
                    (:email,:parola,:nume,:prenume,:telefon,:tip)");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 64);
            $stmt->bindParam(':parola', $parola, PDO::PARAM_STR, 32);
            $stmt->bindParam(':nume', $nume, PDO::PARAM_STR, 64);
            $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR, 64);
            $stmt->bindParam(':telefon', $telefon, PDO::PARAM_STR, 20);
            $stmt->bindParam(':tip', $tip, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function selectUsers() {
        try {
            $stmt = parent::$db->prepare("select * from Users");
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function selectUser($email) {
        try {
            $stmt = parent::$db->prepare("select * from Users where email=:email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $rez = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $rez;
    }

    public function selectUser2($email, $password) {
        try {
            $stmt = parent::$db->prepare("select * from Users where email=:email and parola=:parola");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR, 64);
            $stmt->bindParam(":parola", $password, PDO::PARAM_STR, 64);
            $stmt->execute();
            $rez = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            die($e->getMessage());
        }
        return $rez;
    }

    public function findSID($sid) {
        try {
            $stmt = parent::$db->prepare("select * from Users where sid = :sid");
            $stmt->bindParam(':sid', $sid, PDO::PARAM_STR, 32);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $user;
    }

}
