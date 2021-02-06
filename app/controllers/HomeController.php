<?php

class HomeController extends Controller
{
    public function __construct()
    {
        $this->homeModel = $this->model('Home/home');
    }

    public function include($title)
    {
        $this->view('layout/head', ['title' => $title]);
        $this->view('layout/nav', ['title' => SITENAME]);
    }

    public function index($param = NULL)
    {
        if ($param) :
            $this->include('Page Introuvable');
            $this->view('home/404');
        else :
            $this->include('Accueil');
            $this->view('home/index');
        endif;

        $this->view('layout/footer');
    }
}
