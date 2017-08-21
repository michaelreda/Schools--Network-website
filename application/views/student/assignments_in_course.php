
<div class="wrapper row3">
    
    <div id="comments">
        <h2>Assignments</h2>
        <?php 
            $display="";
            if(count($assignments)>0){
                $display="display:none;";
            }
                
            ?>
        <h4 style="<?=$display?>">No current assignments for this course</h4>
        <ul>
            <?php
            foreach ($assignments as $a) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <h1><?=$a->title?></h1>
                               Post date: <?= $a->post_date ?>
                               <p>Due date: <?= $a->due_date ?></p>
                            </address>

                        </header>
                        <div class="comcont">
                            <p><?= $a->content ?></p>
                        </div>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>


</div>






