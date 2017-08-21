
<div class="wrapper row3">
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
        <h2>Reviews</h2>
        <?php 
            $display="";
            if(count($reviews)>0){
                $display="display:none;";
            }
                
            ?>
        <h4 style="<?=$display?>">No current reviews for this school</h4>
        <ul>
            <?php
            foreach ($reviews as $r) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                By <?= $r->reviewer_name ?>
                            </address>

                        </header>
                        <div class="comcont">
                            <p><?= $r->review ?></p>
                        </div>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>


</div>






