    <?php
    foreach ($data as $key => $value) ${$key} = $value;
    ?>

    <div id="reponse_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reponse_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="reponse_modal_title">Réponse</h4>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="reponse"></div>
                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-info btn-sm propositionBtn" type="button"><i class="fas fa-info mr-2"></i>Proposez une autre solution</button>
                </div>
            </div>
        </div>
    </div>

    <div id="proposition_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="proposition_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="proposition_modal_title">Proposition</h4>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="proposition_form">
                    <input type="hidden" id="id_question_p" name="id_question">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question_p">Question</label>
                            <input id="question_p" class="form-control" type="text" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nom">Votre nom</label>
                            <input id="nom" class="form-control" type="text" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="proposition">Proposition</label>
                            <textarea id="proposition" class="form-control" name="proposition" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button class="btn btn-info" id="envoyer" type="submit">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row align-items-center mt-3 mb-5">
        <div class="container page-wrap">
            <div class="d-md-flex" id="lists">
                <div class="list-group col-sm-12 col-md-5 col-lg-4 ml-2 ml-md-0">
                    <h3>Matières</h3>
                    <?php
                    foreach ($matieres as $matiere) :
                    ?>

                        <section class="list-group-item list-group-item-action">
                            <div class="d-flex d-block justify-content-between align-items-center">
                                <div><?= $matiere->nom ?></div>
                                <div>
                                    <div class="btn-group" role="group">
                                        <button type="button" id="c_matiere_<?= $matiere->id ?>" class="btn btn-light btn-sm controleBtn">Controles</button>
                                        <button type="button" id="e_matiere_<?= $matiere->id ?>" class="btn btn-light btn-sm examBtn">Examens</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
        </div>
    </div>