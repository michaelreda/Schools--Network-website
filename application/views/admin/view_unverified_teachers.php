
<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Unverified Teachers</h2>
        <?php
        $display = "";
        if (count($teachers) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No current teachers signed up in your school</h4>
        <ul>
            <?php
            foreach ($teachers as $t) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $t->first_name ?>  <?= $t->middle_name ?> <?= $t->last_name ?>

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p>Address: <?= $t->address ?></p>
                            <p>Age: <?= $t->age ?></p>
                            <p>Gender: <?= $t->gender ?></p>
                            <p>E-mail: <?= $t->email ?></p>
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>admin/verify_teacher" method="post">
                            <input type="hidden" name="employee_id" value="<?=$t->employee_id  ?>"/>
                            
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






