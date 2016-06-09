<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MangerUsers
 *
 * @author dell notebook
 */
include_once ('database.php');
class ManageUsers {
    public $link;
    
    function __construct() {
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }
    function registerUsers($username,$email,$password,$ip_address,$time,$date){
        $query = $this->link->prepare("INSERT INTO users (username,email,password,ip_address,time,date) VALUES(?,?,?,?,?,?)");
        $values = array($username,$email,$password,$ip_address,$time,$date);
        $query->execute($values);
        $counts = $query->rowCount();
        return $counts;
    }
    function loginUsers($username,$password){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
        $rowcount = $query->rowCount();
        return $rowcount;
    }
    function GetUserInfo($username,$email){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }
}

//echo $users->registerUsers('esethu','12345','127.0.0.1','4:44','5-20-2016');
