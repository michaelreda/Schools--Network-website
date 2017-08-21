<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Teachers</h2>
        <?php
        $display = "";
        if (count($teachers) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No teachers for your children</h4>
        <ul>
            <?php
            foreach ($teachers as $c) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $c->first_name  ?>
                                <?= $c->last_name  ?>

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p>Teacher rating:<?php
                             if($c->rating->rating =="")
                                 echo 0;
                             else
                                 echo $c->rating->rating;
                                    ?></p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Parents/rate_teacher" method="post">
                            <input type="hidden" name="teacher_id" value="<?=$c->teacher_id  ?>"/>
                            
                                  
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rating">Rating</label>
                            <div class="col-md-4">
                                <select id="grade" name="rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                            
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Rate</button>
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






