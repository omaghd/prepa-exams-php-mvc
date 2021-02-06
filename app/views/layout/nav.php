<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="<?= URLROOT ?>" class="navbar-brand"><?= $data['title'] ?></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto text-uppercase">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/grade/first">1ere annee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/grade/second">2eme annee</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= URLROOT ?>/grade/third">3eme annee</a>
                </li>
            </ul>
        </div>
    </nav>