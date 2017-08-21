
<div class="wrapper row3">
    <div class="container">
        <div id="comments">
            <h2>Write Report</h2>
            <?php
            $display = "";
            if (count($questions) > 0) {
                $display = "display:none;";
            }
            ?>
            <h4 style="<?= $display ?>">No questions to answer</h4>
            <ul>
                <?php
                foreach ($questions as $q) {
                    ?>
                    <li>
                        <article>
                            <header>

                                <address>
                                    <?= $q->name ?>

                                </address>

                            </header>
                            <div class="comcont">


                                <p>Question : <?= $q->question ?></p>
                            </div>

                            <form class="form-horizontal"  action="<?= base_url() ?>Teacher/answer_question" method="post">
                                <input type="hidden" name="course_code" value="<?= $q->course_code ?>"/>
                                <input type="hidden" name="student_id" value="<?= $q->student_id ?>"/>
                                <input type="hidden" name="date" value="<?= $q->date ?>"/>
                                <div class="form-group">
                                    <label for="answer">Answer: </label>
                                    <textarea class="form-control" id="assignment" name="answer" rows="5" placeholder="Write Answer"></textarea>
                                </div>
                                <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Answer</button>
                                    </div>

                                </div>

                            </form>
                        </article>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </div>

    </div>
</div>






