<?php

class login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data[0] = '';
        $this->viwe('login/index',$data);
    }
    function checkUser(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error = '';
        $userId = $this->model->check_login_user($username, $password);
        if (!empty($userId)) {
            Model::sessionInit();
            model::sessionSet('userId', $userId['userId']);
            model::sessionSet('Username', $userId['username']);
            $user['Username'] = model::sessionGet('Username');
            $user['userId'] = model::sessionGet('userId');
            echo json_encode(array('success' => 1, 'data' => 'index/index'));
            $login = 1;
        }else{
            $error .=  'entered information is wrong!';
            echo json_encode(array('success' => 0, 'data' => $error));
        }
    }
    function checkLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginOk = 1;
        $error = '';
        if (strlen($username) < 8) {
            $error .= '<br>' . 'نام کاربری وارد شده باید بیشتر از 8 کاراکتر باشد';
            $loginOk = 0;
        }
        if (strlen($password) < 8) {
            $error .= '<br>' . 'رمز عبور وارد شده باید بیشتر از 8 کاراکتر باشد';
            $loginOk = 0;
        }

        $checkUsernameAndPasswordForUsers = $this->model->check_exist_checkUsernameAndPassword_for_users($username, $password);
        if ($checkUsernameAndPasswordForUsers == 1) {
            $error .= '<br>' . 'password is incorrect !';
            $loginOk = 0;
        }
        if ($loginOk == 1) {
            $userId = 'user-' . Model::unique_code(8);
            $this->model->insert_user($userId, $username, $password);
            Model::sessionInit();
            model::sessionSet('userId', $userId);
            model::sessionSet('Username', $username);
            $user['userId'] = model::sessionGet('userId');
            $user['Username'] = model::sessionGet('Username');
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0, 'data' => $error));
        }

    }
    function logOut()
    {
        Model::sessionInit();
        session_unset();
        header('location:' . URL . 'index/index');
    }


}