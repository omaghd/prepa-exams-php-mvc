<?php

class GradeController extends Controller
{
    public function __construct()
    {
        $this->gradeModel = $this->model('Home/grade');
    }

    public function include($title)
    {
        $this->view('layout/head', ['title' => $title]);
        $this->view('layout/nav', ['title' => SITENAME]);
    }

    public function errorPage()
    {
        $this->include('Page Introuvable');
        $this->view('home/404');
    }

    public function index()
    {
        $this->include('Page Introuvable');

        $this->view('home/404');

        $this->view('layout/footer');
    }

    public function first($param = NULL)
    {

        if ($param) :
            $this->errorPage();
        else :
            $this->include('1ère Année');
            $this->view('grades/first');
        endif;

        $this->view('layout/footer');
    }

    public function second($param = NULL)
    {

        if ($param) :
            $this->errorPage();
        else :
            $this->include('2ème Année');
            $this->view('grades/second');
        endif;

        $this->view('layout/footer');
    }

    public function third($param = NULL)
    {

        if ($param) :
            $this->errorPage();
        else :
            $this->include('3ème Année');
            $this->view('grades/third');
        endif;

        $this->view('layout/footer');
    }
}
