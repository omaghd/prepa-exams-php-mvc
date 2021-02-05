<?php

class HomeController extends Controller
{
    public function __construct()
    {
        $this->homeModel = $this->model('Home/home');
    }

    public function index()
    {
        $this->view('home/index');
    }
}
