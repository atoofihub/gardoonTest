<?php

class model_login extends Model
{
    function __construct()
    {
        parent::__construct();

    }
    function check_login_user($username,$password){
        $sql = "SELECT `userId` , `username` FROM `user` WHERE `username`=? and `password`=?";
        $parameter = array($username, $password);
        $result = $this->doselect($sql, $parameter, 1);
        return $result;
    }
    function check_exist_checkUsernameAndPassword_for_users($username, $password)
    {
        $sql = "SELECT `username` FROM `user` WHERE `username`=? and `password`=?";
        $parameter = array($username, $password);
        $check = $this->doselect($sql, $parameter, 1);
        if ($check) {
            return 1;
        } else {
            return 0;
        }
    }
    function insert_user($userId,$username,$password){
        $sql = "INSERT INTO `user` (userId,username,password,registerDate) VALUES (?,?,?,now())";
        $para = array($userId,$username,$password);
        $this->doquery($sql, $para);
    }
}