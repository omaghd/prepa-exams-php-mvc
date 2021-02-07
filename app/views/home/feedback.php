    <?php
    ?>

    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="display-4 mb-2">Your Feedback Matters!</div>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-6">
                            <form action="" method="post" id="feedback_form">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <input id="name" class="form-control" placeholder="Your Name" type="text" name="name" required>
                                    </div>
                                    <div class="form-group col col-sm">
                                        <input id="email" class="form-control" placeholder="email@example.com" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feedback"></label>
                                    <textarea id="feedback" class="form-control" name="feedback" rows="3" placeholder="What's on your mind?" required></textarea>
                                </div>
                                <button class="btn btn-outline-info btn-block" id="send" type="submit">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>