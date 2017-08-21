
<div class="wrapper row3">
    <div class="container">
        <div id="comments">
            <h2>Write Report</h2>
            <?php
            $display = "";
            if (count($students) > 0) {
                $display = "display:none;";
            }
            ?>
            <h4 style="<?= $display ?>">No students to report</h4>
            <ul>
                <?php
                foreach ($students as $s) {
                    ?>
                    <li>
                        <article>
                            <header>

                                <address>
                                    <?= $s->first_name ?> <?= $s->last_name ?>

                                </address>

                            </header>
                            <div class="comcont">


                                <p>Grade : <?= $s->grade ?></p>
                            </div>

                            <form class="form-horizontal"  action="<?= base_url() ?>Teacher/write_report" method="post">
                                <input type="hidden" name="student_id" value="<?= $s->student_id ?>"/>
                                <input type="hidden" name="child_ssn" value="<?= $s->child_ssn ?>"/>
                                <div class="form-group">
                                    <label for="comment">Comment: </label>
                                    <textarea class="form-control" id="assignment" name="comment" rows="5" placeholder="Write Comment"></textarea>
                                </div>
                                <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Write</button>
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






