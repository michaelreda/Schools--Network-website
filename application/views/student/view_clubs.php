
<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Clubs</h2>
        <?php
        $display = "";
        if (count($clubs) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No current clubs in your school</h4>
        <ul>
            <?php
            foreach ($clubs as $c) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $c->club_name ?>

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p><?= $c->purpose ?></p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Student/join_club" method="post">
                            <input type="hidden" name="club_name" value="<?=$c->club_name  ?>"/>
                            
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Join</button>
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






