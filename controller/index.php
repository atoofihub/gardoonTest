<?php


class index extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data[1] = $this->model->select_category();
        $this->viwe('index/index', $data);
    }

    function category()
    {
        $id = $_POST['categoryId'];
        $result = $this->model->select_category_number($id);
        echo json_encode(array('status' => 200, 'data' => $result));
    }

    function update_category()
    {
        $id = $_POST['categoryId'];
        $number = $_POST['new_number'];
        $this->model->update_category_number($id, $number);
        echo json_encode(array('status' => 200));
    }

}