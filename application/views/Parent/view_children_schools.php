<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Schools</h2>
        <?php
        $display = "";
        if (count($schools) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">Your children are not enrolled in any schools</h4>
        <ul>
            <?php
            foreach ($schools as $c) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $c->school_name ?>

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p><?= $c->school_address ?></p>
                                  <p><?= $c->first_name ?></p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Parents/review_school" method="post">
                            <input type="hidden" name="school_name" value="<?=$c->school_name  ?>"/>
                            <input type="hidden" name="school_address" value="<?=$c->school_address  ?>"/>
                          
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="review">Your Review</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="answer" name="review" rows="10"></textarea>
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






