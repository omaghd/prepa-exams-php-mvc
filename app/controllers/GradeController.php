<?php

class GradeController extends Controller
{
    public function __construct()
    {
        $this->gradeModel   = $this->model('Home/grade');
        $this->matiereModel = $this->model('Home/matiere');
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

    public function first($semestre = NULL, $other = NULL)
    {
        if ($other) :
            $this->errorPage();
        elseif (!$semestre || $semestre == 's1' || $semestre == 's2') :
            $this->include('1ère Année');
            $this->view('grades/first/index');
        else :
            $this->errorPage();
        endif;

        $this->view('layout/footer');
    }

    public function second($semestre = NULL, $other = NULL)
    {
        if ($other) :
            $this->errorPage();
        elseif (!$semestre || $semestre == 's1' || $semestre == 's2') :
            $this->include('2ème Année');
            $this->view('grades/second/index');
        else :
            $this->errorPage();
        endif;

        $this->view('layout/footer');
    }

    public function third($semestre = NULL, $other = NULL)
    {
        if ($other) :
            $this->errorPage();
        elseif (!$semestre) :
            $this->include('3ème Année');
            $this->view('grades/third/index');
        elseif ($semestre == 's1') :
            $matieres = $this->matiereModel->afficherMatieres();
            $this->include('3ème Année - S1');
            $this->view('grades/third/s1', [
                'matieres' => $matieres
            ]);
        elseif ($semestre == 's2') :
            $matieres = $this->matiereModel->afficherMatieres();
            $this->include('3ème Année - S2');
            $this->view('grades/third/s2');
        else :
            $this->errorPage();
        endif;

        $this->view('layout/footer');
    }
}
