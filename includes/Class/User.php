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

    //---------------------------------Dashboard-----------------------------------------
    public function selectAllDashboards() {
        try {
            $stmt = parent::$db->prepare("select * from Dashboard where id_user=$this->id");
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function selectDashboard($nume) {
        try {
            $stmt = parent::$db->prepare("select * from Dashboard where id_user=$this->id and nume=:nume");
            $stmt->bindParam(":nume", $nume, PDO::PARAM_STR, 32);
            $stmt->execute();
            $rez = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function selectDashboards() {
        try {
            $stmt = parent::$db->prepare("select * from Dashboard where id_user=$this->id");
            $stmt->bindParam(":nume", $nume, PDO::PARAM_STR, 32);
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function addDashboard($nume, $tip = "private") {
        try {
            $stmt = parent::$db->prepare("insert into Dashboard (id_user,tip,nume) values ($this->id,:tip,:nume)");
            $stmt->bindParam(":tip", $tip, PDO::PARAM_STR, 32);
            $stmt->bindParam(":nume", $nume, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateDashboard($id_dashboard, $name, $tip = "private") {
        try {
            $stmt = parent::$db->prepare("update Dashboard set nume=:nume, tip=:tip where id=:id");
            $stmt->bindParam(":id", $id_dashboard, PDO::PARAM_INT);
            $stmt->bindParam(":tip", $tip, PDO::PARAM_STR, 32);
            $stmt->bindParam(":nume", $name, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function countDashboard() {
        try {
            $stmt = parent::$db->prepare("select count(*) from Dashboard where id_user=$this->id");
            $stmt->execute();
            $rez = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? 0 : $rez;
    }

    //---------------------------------Sensor---------------------------------------
    public function selectAllSensors() {
        try {
            $stmt = parent::$db->prepare("select id,id_dashboard,tip,um,pozitie,nume,zecimale from Sensor where id_dashboard in (select id from Dashboard where id_user=$this->id) order by id_dashboard");
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function selectSensors($id_dashboard) {
        try {
            $stmt = parent::$db->prepare("select * from Sensor where id_dashboard=:id");
            $stmt->bindParam(":id", $id_dashboard, PDO::PARAM_INT);
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }
    
    public function selectSensor($dashboard, $nume) {
        try {
            $stmt = parent::$db->prepare("select * from Sensor where id_dashboard=:id and nume=:nume");
            $stmt->bindParam(":id", $dashboard, PDO::PARAM_INT);
            $stmt->bindParam(":nume", $nume, PDO::PARAM_STR, 64);
            $stmt->execute();
            $rez = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function addSensor($dashboard, $tip, $nume, $zecimale) {
        $um = "";
        if ($tip == "Temperatură") {
            $um = "°C";
        } else if ($tip == "Luminozitate") {
            $um = "lux";
        } else if ($tip == "Umiditate") {
            $um = "%";
        }
        $nr = $this->getNrSensors($dashboard)["nr"];
        $nr++;
        try {
            $stmt = parent::$db->prepare("insert into Sensor (id_dashboard,um,pozitie,nume,zecimale,tip) values (:id,:um,:nr,:nume,:zecimale,:tip)");
            $stmt->bindParam(":id", $dashboard, PDO::PARAM_INT);
            $stmt->bindParam(":um", $um, PDO::PARAM_STR, 32);
            $stmt->bindParam(":nr", $nr, PDO::PARAM_INT);
            $stmt->bindParam(":nume", $nume, PDO::PARAM_STR, 64);
            $stmt->bindParam(":zecimale", $zecimale, PDO::PARAM_INT);
            $stmt->bindParam(":tip", $tip, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getNrSensors($dashboard) {
        try {
            $stmt = parent::$db->prepare("select count(*) as nr from Sensor where id_dashboard=:id");
            $stmt->bindParam(":id", $dashboard, PDO::PARAM_INT);
            $stmt->execute();
            $rez = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function updateSensor($id,$nume, $tip, $zecimale) {
        $um = "";
        if ($tip == "Temperatură") {
            $um = "°C";
        } else if ($tip == "Luminozitate") {
            $um = "lux";
        } else if ($tip == "Umiditate") {
            $um = "%";
        }
        try {
            $stmt = parent::$db->prepare("update Sensor set um=:um,nume=:nume,zecimale=:zecimale,tip=:tip where id=:id");
            $stmt->bindParam(":um", $um, PDO::PARAM_STR, 32);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":nume", $nume, PDO::PARAM_STR, 64);
            $stmt->bindParam(":zecimale", $zecimale, PDO::PARAM_INT);
            $stmt->bindParam(":tip", $tip, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function deleteSensor($id){
        $this->deleteSensorValues($id);
        try {
            $stmt = parent::$db->prepare("delete from Sensor where id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //----------------------------Value----------------------------------------
    public function selectSensorValues($id_sensor) {
        try {
            $stmt = parent::$db->prepare("select * from Value where id_sensor=:id");
            $stmt->bindParam(":id", $id_sensor, PDO::PARAM_INT);
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez === false ? null : $rez;
    }

    public function addSensorValue($id_sensor, $value) {
        try {
            $stmt = parent::$db->prepare("insert into Value (id_sensor,valoare) values (:id,:valoare)");
            $stmt->bindParam(":id", $id_sensor, PDO::PARAM_INT);
            $stmt->bindParam(":valoare", $value, PDO::PARAM_STR, 32);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getLastSensorValue($dashboard) {
        try {
            $stmt = parent::$db->prepare(""
                    . "select v.data,v.id_sensor,v.valoare,s.pozitie from Value v,Sensor s "
                    . "where s.id_dashboard=:dashboard and s.id=v.id_sensor "
                    . "GROUP BY v.id_sensor,v.data,v.valoare,s.pozitie "
                    . "HAVING v.data=("
                    . "select max(data) from Value v2 "
                    . "where v2.id_sensor=v.id_sensor"
                    . ")");
            $stmt->bindParam(":dashboard", $dashboard, PDO::PARAM_INT);
            $stmt->execute();
            $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $rez == false ? null : $rez;
    }
    public function deleteSensorValues($id){
        try {
            $stmt = parent::$db->prepare("delete from Value where id_sensor=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
