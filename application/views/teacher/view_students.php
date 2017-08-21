
<div class="wrapper row3">
    <div class="container">
        <style>
            h2{

                padding-top: 5px;
                padding-left: 20px;

            }
            .row{
                display: -webkit-box;
                padding-left: 60px;
                padding-bottom: 30px;
            }
        </style>
        <div id="comments">
            <h2>My students</h2>
            <?php
            $display = "";
            if (count($students) > 0) {
                $display = "display:none;";
            }
            ?>
            <h4 style="<?= $display ?>">No current students for you</h4>
            <ul>
                <?php
                foreach ($students as $s) {
                    ?>
                    <li>
                        <article>
                            <header>

                                <address>
                                    <?= $s->name ?>
                                </address>

                            </header>
                            <div class="comcont">


                                <p>Grade : <?= $s->grade ?></p>
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






