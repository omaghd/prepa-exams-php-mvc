<?php
function checkActiveItem($itemName)
{
    $url = ltrim(rtrim($_SERVER['REQUEST_URI'], '/'), '/' . DIR . '/');
    switch ($url) {
        case 'grade/first/s1':
        case 'grade/first/s2':
            if ($itemName == 'first') echo 'active';
            break;
        case 'grade/second/s1':
        case 'grade/second/s2':
            if ($itemName == 'second') echo 'active';
            break;
        case 'grade/third/s1':
        case 'grade/third/s2':
            if ($itemName == 'third') echo 'active';
            break;
    }
}
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="<?= URLROOT ?>" class="navbar-brand"><?= $data['title'] ?></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto text-uppercase">
                <li class="nav-item dropdown <?= checkActiveItem('first') ?>">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        1ere annee
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= URLROOT ?>/grade/first/s1">S1</a>
                        <a class="dropdown-item" href="<?= URLROOT ?>/grade/first/s2">S2</a>
                    </div>
                </li>
                <li class="nav-item dropdown <?= checkActiveItem('second') ?>">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        2eme annee
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= URLROOT ?>/grade/second/s1">S1</a>
                        <a class="dropdown-item" href="<?= URLROOT ?>/grade/second/s2">S2</a>
                    </div>
                </li>
                <li class="nav-item dropdown <?= checkActiveItem('third') ?>">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        3eme annee
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= URLROOT ?>/grade/third/s1">S1</a>
                        <a class="dropdown-item" href="<?= URLROOT ?>/grade/third/s2">S2</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        LIENS UTILES
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" target="_blank" href="https://drive.google.com/drive/folders/0B-5IJNM_GT1GVGI4eVhGTXllM00">Dossier Examens</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="https://drive.google.com/drive/folders/1gyTG59qJyQuHTDqn78kHoMmexgoL52jJ">Cours PHP</a>
                        <a class="dropdown-item" target="_blank" href="https://drive.google.com/drive/folders/1H9Vv5hOwrJoGxU6rovYVZRXrQID8RFRN">Cours JAVA</a>
                        <a class="dropdown-item" target="_blank" href="https://drive.google.com/drive/folders/1N-bRFxrwO5mph1d_e4BwSO2IVWD4JRWd">Cours UML</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="https://classroom.google.com/c/MTY1MjcyOTE2MzI3">Classroom UML</a>
                        <a class="dropdown-item" target="_blank" href="https://classroom.google.com/c/MTY2OTgwNjE3MDkw">Classroom TEC</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="http://l3.vinciclopedie.com/">Calendrier</a>
                        <a class="dropdown-item" target="_blank" href="https://absence.vinciclopedie.com/">Absence</a>
                        <a class="dropdown-item" target="_blank" href="https://vmarks.vinciclopedie.com/student/index">Notes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= URLROOT ?>/feedback">Leave a Feedback</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>