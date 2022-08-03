<?php


class model_index extends Model
{
    function __construct()
    {
        parent::__construct();

    }

    function select_category()
    {
        $sql = "SELECT `id`,`name`,`number` FROM `category` ";
        $result = $this->doselect($sql);
        return $result;
    }

    function select_category_number($id)
    {
        $sql = "SELECT `number` FROM `category` where id = ? ";
        $para = array($id);
        $result = $this->doselect($sql, $para);
        return $result;
    }

    function update_category_number($id, $number)
    {
        $sql = "update `category` set `number`=? where `id`=?";
        $para = array($number, $id);
        $this->doquery($sql, $para);
    }

}