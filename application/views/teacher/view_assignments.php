
<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Assignments</h2>
        <?php
        $display = "";
        if (count($assignments) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No current assignments posted</h4>
        <ul>
            <?php
            foreach ($assignments as $a) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $a->name ?>
                              
                             

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p><?= $a->answer ?></p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Teacher/grade_assignments" method="post">
                            <input type="hidden" name="course" value="<?=$a->course_code  ?>"/>
                            <input type="hidden" name="student_id" value="<?=$a->student_id  ?>"/>
                            <input type="hidden" name="child_ssn" value="<?=$a->child_ssn  ?>"/>
                            <input type="hidden" name="post_date" value="<?=$a->post_date  ?>"/>
                            <!-- Text input-->
                            
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="score">Score</label>  
                                    <div class="col-md-4">
                                        <input id="first_name" name="score" type="int" placeholder="score" class="form-control input-md">

                                    </div>
                                </div>
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">grade</button>
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






