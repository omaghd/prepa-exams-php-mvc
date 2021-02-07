<?php

class ExamController extends Controller
{
    public function __construct()
    {
        $this->examModel = $this->model('Home/Exam');
    }

    public function index($param = NULL)
    {
        if ($param)
            echo 'Ahya sir fhalk';
    }

    public function dates()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') :
            if (@$_POST['show'] == 'controles') :
                $dates = $this->examModel->afficherDatesParMatiere($_POST['matiereID'], 1);
                echo json_encode($dates);
            elseif (@$_POST['show'] == 'exams') :
                $dates = $this->examModel->afficherDatesParMatiere($_POST['matiereID'], 2);
                echo json_encode($dates);
            endif;
        endif;
    }

    public function questions()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') :
            $questions  = $this->examModel->afficherQuestions($_POST['matiereID'], $_POST['session'], $_POST['annee'], $_POST['type']);
            $parties    = $this->examModel->afficherParties($_POST['matiereID'], $_POST['session'], $_POST['annee'], $_POST['type']);
            echo json_encode([
                'questions' => $questions,
                'parties'   => $parties
            ]);
        endif;
    }

    public function reponse()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') :
            $reponse    = $this->examModel->afficherReponse($_POST['questionID']);
            echo json_encode($reponse);
        endif;
    }

    public function proposition()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') :
            if ($this->examModel->ajouterProposition($_POST['nom'], $_POST['proposition'], $_POST['id_question']))
                echo json_encode([
                    'status' => 200,
                    'message' => 'Proposition envoyée! Merci :)'
                ]);
            else
                echo json_encode([
                    'status' => 400,
                    'message' => 'Error'
                ]);
        endif;
    }
}
