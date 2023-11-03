<?php

class NotFoundController extends Controller
{
    public function index(){
        $data = array();

        $this->loadView("Admin/ListViews/404", $data);
    }
}
