
<div class="wrapper row3">
    
    <div id="comments">
        <h2>Questions</h2>
        <?php 
            $display="";
            if(count($questions)>0){
                $display="display:none;";
            }
                
            ?>
        <h4 style="<?=$display?>">No current questions for this course</h4>
        <ul>
            <?php
            foreach ($questions as $q) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $q->question ?>
                            </address>

                        </header>
                        <div class="comcont">
                            <p><?= $q->answer ?></p>
                        </div>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>


</div>






