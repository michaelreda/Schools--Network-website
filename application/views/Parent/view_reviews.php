<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Reviews</h2>
        <?php
        $display = "";
        if (count($reviews) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">You did not review any school yet</h4>
        <ul>
            <?php
            foreach ($reviews as $c) {
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
                            <p><?= $c->review ?></p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Parents/delete_review" method="post">
                            <input type="hidden" name="school_name" value="<?=$c->school_name  ?>"/>
                            <input type="hidden" name="school_address" value="<?=$c->school_address  ?>"/>
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="submit">Delete</button>
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






