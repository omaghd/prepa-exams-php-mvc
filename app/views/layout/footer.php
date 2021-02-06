    <?php
    ?>

    <hr>
    <footer class="pb-3">
        <div class="text-muted text-center">
            <div>
                Copyright &copy; <?= date('Y') == 2021 ? date('Y') : '2021 - ' . date('Y') ?>
            </div>
            <div>
                <a href="https://omaghd.com">OmaghD.com</a> &mdash; Omar EL ATMANI
            </div>
            <div>
                <a href="<?= URLROOT . '/disclaimer' ?>">Disclaimer</a>
            </div>
        </div>
    </footer>

    <script src="<?= URLROOT . '/assets/jquery/js/jquery.min.js' ?>"></script>
    <script src="<?= URLROOT . '/assets/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= URLROOT . '/assets/font-awesome/js/font-awesome.min.js' ?>"></script>
    </body>

    </html>