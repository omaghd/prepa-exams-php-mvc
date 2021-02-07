<?php

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->feedbackModel = $this->model('Home/Feedback');
    }

    public function index($param = NULL)
    {
        if ($param) :
            $this->view('layout/head', ['title' => 'Page Introuvable']);
            $this->view('layout/nav', ['title' => SITENAME]);
            $this->view('home/404');
        else :
            $this->view('layout/head', ['title' => 'Feedback']);
            $this->view('layout/nav', ['title' => SITENAME]);
            $this->view('home/feedback');
        endif;
        $this->view('layout/footer');
    }

    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            if ($this->feedbackModel->ajouterFeedback($_POST['name'], $_POST['email'], $_POST['feedback']))
                echo json_encode([
                    'status' => 200,
                    'message' => 'Feedback recieved, I appreciate :D'
                ]);
            else
                echo json_encode([
                    'status' => 400,
                    'message' => 'Error'
                ]);
        endif;
    }
}
