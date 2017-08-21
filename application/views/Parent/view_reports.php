<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Reports</h2>
        <?php
        $display = "";
        if (count($reports) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No reports to view</h4>
        <ul>
            <?php
            foreach ($reports as $c) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $c->first_name ?>
                                 <?= $c->last_name ?>

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p><strong>by teacher: </strong><p><?= $c->teacher_id ?></p>
                            <p><?= $c->teacher_comment ?><p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Parents/reply_reports" method="post">
                           <input type="hidden" name="teacher_id" value="<?=$c->teacher_id  ?>"/>
                           <input type="hidden" name="student_id" value="<?=$c->student_id  ?>"/>
                           <input type="hidden" name="child_ssn" value="<?=$c->child_ssn  ?>"/>

                               
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="reply">Your Reply</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="answer" name="reply" rows="10"></textarea>
                            </div>
                        </div>
                       
                            
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Submit</button>
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






