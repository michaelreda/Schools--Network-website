
<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Unverified Students</h2>
        <?php
        $display = "";
        if (count($students) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No current students to verify in your school</h4>
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
                            
                            <p>Age: <?= $s->age ?></p>
                            <p>Gender: <?= $s->gender ?></p>
                            <p>Grade : <?= $s->grade ?></p>
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>admin/verify_student" method="post">
                            <input type="hidden" name="student_id" value="<?=$s->student_id  ?>"/>
                            
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Verify</button>
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






