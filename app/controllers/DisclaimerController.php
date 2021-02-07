<?php

class DisclaimerController extends Controller
{
    public function index($param = NULL)
    {
        if ($param) :
            $this->view('layout/head', ['title' => 'Page Introuvable']);
            $this->view('layout/nav', ['title' => SITENAME]);
            $this->view('home/404');
        else :
            $this->view('layout/head', ['title' => 'Disclaimer']);
            $this->view('layout/nav', ['title' => SITENAME]);
            $this->view('home/disclaimer');
        endif;
        $this->view('layout/footer');
    }
}
