    <?php
    foreach ($data as $key => $value) ${$key} = $value;
    ?>

    <div class="d-flex flex-row align-items-center mt-3">
        <div class="container">
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