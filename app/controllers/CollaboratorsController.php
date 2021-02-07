<?php

class CollaboratorsController extends Controller
{
    public function index($param = NULL)
    {
        if ($param) :
            $this->view('layout/head', ['title' => 'Page Introuvable']);
            $this->view('layout/nav', ['title' => SITENAME]);
            $this->view('home/404');
        else :
            $this->view('layout/head', ['title' => 'Collaborators']);
            $this->view('layout/nav', ['title' => SITENAME]);
            $this->view('home/collaborators');
        endif;
        $this->view('layout/footer');
    }
}
