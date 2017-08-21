
<div class="wrapper row3">
    <div class="container">
        <div id="comments">
            <h2>Applying Students</h2>
            <?php
            $display = "";
            if (count($students) > 0) {
                $display = "display:none;";
            }
            ?>
            <h4 style="<?= $display ?>">No current students to applying in your school</h4>
            <ul>
                <?php
                foreach ($students as $s) {
                    ?>
                    <li>
                        <article>
                            <header>

                                <address>
                                    <?= $s->student_name ?>

                                </address>

                            </header>
                            <div class="comcont">

                                <p>Parent: <?= $s->parent_name ?></p>

                            </div>
                            <div class="row" style="
                                 display: -webkit-inline-box;
                                 ">
                                <form class="form-horizontal"  action="<?= base_url() ?>admin/accept_student" method="post">
                                    <input type="hidden" name="child_ssn" value="<?= $s->child_ssn ?>"/>

                                    <!-- Button -->
                                    <div class="form-group">

                                        <div class="col-md-4" style="float:none;">
                                            <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Accept</button>
                                        </div>

                                    </div>

                                </form>
                                <form class="form-horizontal"  action="<?= base_url() ?>admin/reject_student" method="post">
                                    <input type="hidden" name="child_ssn" value="<?= $s->child_ssn ?>"/>

                                    <!-- Button -->
                                    <div class="form-group">

                                        <div class="col-md-4" style="float:none;">
                                            <button id="submit" name="submit" class="btn btn-danger" type="submit" value="Submit">Reject</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </article>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </div>

    </div>
</div>






