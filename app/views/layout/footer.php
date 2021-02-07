    <?php
    ?>

    <hr>
    <footer class="pb-3">
        <div class="text-muted text-center">
            <div>
                Copyright &copy; <?= date('Y') == 2021 ? date('Y') : '2021 - ' . date('Y') ?>
            </div>
            <div>
                Made with ♥ By Omar EL ATMANI &mdash; <a href="https://omaghd.com">OmaghD.com</a>
            </div>
            <div>
                <a href="<?= URLROOT . '/disclaimer' ?>">Disclaimer</a>
            </div>
        </div>
    </footer>

    <script src="<?= URLROOT . '/assets/jquery/js/jquery.min.js' ?>"></script>
    <script src="<?= URLROOT . '/assets/bootstrap/js/bootstrap.bundle.min.js' ?>" defer></script>
    <script src="<?= URLROOT . '/assets/font-awesome/js/font-awesome.min.js' ?>" defer></script>
    <script src="<?= URLROOT . '/assets/sweetalert/js/sweetalert2.all.min.js' ?>" defer></script>
    <script>
        $(function() {
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-QG4VCTT8HB');

            $('.controleBtn').click(function() {
                setActive('c', $(this));
                let matiereID = $(this).attr('id').replace('c_matiere_', '');
                let title = 'Controles';
                $.ajax({
                    type: "post",
                    url: "<?= URLROOT . '/exam/dates' ?>",
                    data: {
                        matiereID: matiereID,
                        show: 'controles'
                    },
                    dataType: "json",
                    success: function(dates) {
                        afficherDates(dates, title, 1);
                    }
                });
            });

            $('.examBtn').click(function() {
                setActive('e', $(this));
                let matiereID = $(this).attr('id').replace('e_matiere_', '');
                let title = 'Examens';
                $.ajax({
                    type: "post",
                    url: "<?= URLROOT . '/exam/dates' ?>",
                    data: {
                        matiereID: matiereID,
                        show: 'exams'
                    },
                    dataType: "json",
                    success: function(dates) {
                        afficherDates(dates, title, 2);
                    }
                });
            });

            function afficherDates(dates, title, type) {
                let datesHTML = '';
                $.each(dates, function(index, date) {
                    let id = date.annee.replace('/', '_');
                    let session = date.session == 1 ? 'N' : 'R';
                    datesHTML += `
                    <li class="nav-item">
                        <a class="nav-link dateBtn" type="${type}" session="${session}" date="${date.id_annee}" id="date_matiere_${date.id_matiere}" data-toggle="tab" href="#annee_${id}">${date.annee} (${session})</a>
                    </li>
                    `;
                });
                let examsDates = `
                <div class="list-group col-sm col-md col-lg ml-2 ml-md-0 mt-md-0 mt-2" id="liste_courante">
                    <h3>${title}</h3>
                    <ul class="nav nav-tabs">
                        ${datesHTML}
                    </ul>
                </div>
                `;
                $('#liste_courante').remove();
                $('#lists').append(examsDates);
                dateBtn();
            }

            function dateBtn() {
                $('.dateBtn').click(function(e) {
                    e.preventDefault();
                    let matiereID = $(this).attr('id').replace('date_matiere_', '');
                    let session = $(this).attr('session') == 'N' ? 1 : 2;
                    let annee = $(this).attr('date');
                    let type = $(this).attr('type');
                    $.ajax({
                        type: "post",
                        url: "<?= URLROOT . '/exam/questions' ?>",
                        data: {
                            matiereID: matiereID,
                            session: session,
                            annee: annee,
                            type: type
                        },
                        dataType: "json",
                        success: function(response) {
                            let questions = response.questions;
                            let parties = response.parties;
                            let annee = $('.dateBtn.active').attr('href').replace('#', '');

                            afficherParties(parties, questions, annee);
                            afficherReponseModal();

                            var url = location.href;
                            location.href = "#liste_courante";
                            history.replaceState(null, null, url);
                        }
                    });
                });
            }

            function afficherParties(parties, questions, annee) {
                let questionsHTML = `
                            <div class="tab-content" id="questions_courantes">
                                <div class="tab-pane fade active show" id="${annee}">
                                    <div class="accordion mt-3" id="parties">
                                    `;
                $.each(parties, function(index, partie) {
                    let questionsCourantesHTML = afficherQuestionsParPartie(questions, partie.partie);
                    questionsHTML += `<!-- DEBUT PARTIE -->
                                        <div class="card">
                                            <div class="card-header py-1" id="partie_${partie.partie}">
                                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_${partie.partie}" aria-expanded="true" aria-controls="collapse_${partie.partie}">
                                                    <h5>
                                                        Partie ${partie.partie}:
                                                    </h5>
                                                </button>
                                            </div>

                                            <div id="collapse_${partie.partie}" class="collapse show" aria-labelledby="partie_${partie.partie}" data-parent="#parties">
                                                <div class="card-body">
                                                    <div class="list-group">
                                                        <samll class="text-muted mb-2">*Tapez sur la question pour voir la réponse proposée</samll>
                                                        <ol class="p-0" id="questions_partie_${partie.partie}">
                                                            <!-- DEBUT QUESTIONS -->
                                                                ${questionsCourantesHTML}
                                                            <!-- FIN QUESTIONS -->
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN PARTIE -->
                                        `;
                });
                questionsHTML += `</div>
                                </div>
                            </div>
                            `;
                $('#questions_courantes').remove();
                $('#liste_courante').append(questionsHTML);
            }

            function afficherQuestionsParPartie(questions, partie) {
                let questionsCourantesHTML = '';
                $.each(questions, function(index, question) {
                    if (question.partie == partie) {
                        questionsCourantesHTML += `
                        <div class="list-group-item list-group-item-action reponseTrigger" id="question_${question.id}">
                            <li class="ml-3">
                                ${question.question}
                            </li>`
                        if (question.points != null) {
                            questionsCourantesHTML += ` <div class="d-flex justify-content-end">
                                                            <small class="font-weight-bold badge badge-pill badge-dark py-2">${parseFloat(question.points)} pts</small>
                                                        </div>`
                        }
                        questionsCourantesHTML += `</div>
                        `;
                    }
                });
                return questionsCourantesHTML;
            }

            function setActive(type, element) {
                $('section').removeClass('active');
                $(element).parent().parent().parent().parent().addClass('active');
            }

            function afficherReponseModal() {
                $('.reponseTrigger').click(function(e) {
                    e.preventDefault();
                    let questionID = $(this).attr('id').replace('question_', '');
                    $('#reponse').html('<div class="spinner-grow" role="status"></div>');
                    $.ajax({
                        type: "post",
                        url: "<?= URLROOT . '/exam/reponse' ?>",
                        data: {
                            questionID: questionID
                        },
                        dataType: "json",
                        success: function(response) {
                            let reponse = response.reponse;
                            if (reponse != null) {
                                $('#reponse').html(response.reponse);
                            } else
                                $('#reponse').html('<span class="text-muted">-- Pas de réponse pour le moment --</span>');

                            $('.propositionBtn').attr('id', questionID);
                        }
                    });
                    $('#reponse_modal').modal('show');
                });
            }

            $('.propositionBtn').click(function() {
                let questionID = $(this).attr('id');
                let questionText = $(`#question_${questionID}`).find('li').text().trim();
                $('#question_p').val(questionText);
                $('#id_question_p').val(questionID);
                $('#reponse_modal').modal('hide');
                $('#proposition_modal').modal('show');
            });

            $('#proposition_form').submit(function(e) {
                e.preventDefault();
                $('#envoyer').html('<div class="spinner-grow" role="status"></div>');
                $.ajax({
                    type: "post",
                    url: "<?= URLROOT . '/exam/proposition' ?>",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#envoyer').html('ENVOYER');
                            $(this).trigger("reset");
                            $('#proposition_modal').modal('hide');
                            afficherToast(response.message, 'success', 4000);
                        }
                    }
                });
            });

            function afficherToast(message, icon, duration) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: duration,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: icon,
                    title: message
                });
            }

            <?php
            if (strpos($_SERVER['REQUEST_URI'], 'feedback')) :
            ?>

                $('#feedback_form').submit(function(e) {
                    e.preventDefault();
                    $('#send').html('<div class="spinner-grow" role="status"></div>');
                    $.ajax({
                        type: "post",
                        url: "<?= URLROOT . '/feedback/send' ?>",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 200) {
                                $('#send').html('SEND');
                                $('#feedback_form').trigger('reset');
                                afficherToast(response.message, 'success', 6000);
                            }
                        }
                    });
                });
            <?php
            endif;
            ?>

        });
    </script>
    </body>

    </html>