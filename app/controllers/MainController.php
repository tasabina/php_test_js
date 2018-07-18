<?php

class MainController extends \Controller

{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();

    }
    function index()
    {
        
        // $data = $this->model->save_data();
        $data = $this->model->load_data();
        $this->view->render('test.php','layout.php', $data);
    }

}