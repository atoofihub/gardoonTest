<?php

class Model
{
    public static $conn = '';


    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'gardoon';


        try {
            $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $database, $username, $password, $attr);
        } catch (PDOException $pe) {
            echo $pe->getMessage();

        }
    }

    function doselect($sql, $values = [], $fetch = '', $fetchstyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchstyle);
        } else {
            $result = $stmt->fetch($fetchstyle);
        }
        return $result;
    }

    function doquery($sql, $values = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
    }

    public static function unique_code($limit)
    {

        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);

    }

    public static function sessionInit()
    {

        @session_start();
    }

    public static function sessionSet($name, $value)
    {

        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {

        if (isset($_SESSION[$name])) {

            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function setcooki($cookie_name, $cookie_value, $time = (86400 * 1))
    {
        setcookie($cookie_name, $cookie_value, time() + $time, "/");
    }

    public static function issetcooki($cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])) {
            $value = $_COOKIE[$cookie_name];
        } else {
            $value = false;
        }
        return $value;
    }

    public static function en_number($date)
    {

        $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");

        return str_replace($fa, $en, $date);
    }
    public static function fa_number($number)
    {
        if (!is_numeric($number) || empty($number))
            return '۰';
        $x = number_format($number);
        $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");

        return str_replace($en, $fa, $x);
    }

    function latinToFarsi($number)
    {
        if (!is_numeric($number) || empty($number))
            return '۰';
        $en_num = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $fa_num = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        return str_replace($en_num, $fa_num, $number);
    }

}

