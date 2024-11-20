<?php

require '../app/models/Main.php';

class MainController {

    public function index(){
        $mainModel = new Main();
        $aboutList = $mainModel->getAllAbout();
        require '../app/views/frolov/index.php';
    }
}