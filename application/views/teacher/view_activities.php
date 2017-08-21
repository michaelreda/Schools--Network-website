
<div class="wrapper row3">
    <div class="container">
    <div id="comments">
        <h2>Activities</h2>
        <?php
        $display = "";
        if (count($activities) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No current activities in your school</h4>
        <ul>
            <?php
            foreach ($activities as $a) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <h1><?= $a->location ?></h1>
                                <?= $a->date ?>

                            </address>

                        </header>
                        <div class="comcont">
                            <p>Type: <?= $a->type ?></p>
                            <p><?= $a->description ?></p>
                            <?php
                                $equip="No equipment needed";
                                if($a->equipment){
                                    $equip="Equipment needed: ".$a->equipment;
                                }
                            ?>
                            <p> <?= $equip ?></p>
                            <p><strong>responsible teacher: </strong><?= $a->first_name ?> <?= $a->last_name ?></p>
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Student/join_activity" method="post">
                            <input type="hidden" name="date" value="<?=$a->date ?>"/>
                            <input type="hidden" name="location" value="<?=$a->location ?>"/>
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






