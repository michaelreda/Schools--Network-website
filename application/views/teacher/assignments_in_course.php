
<div class="wrapper row3">
    <div class="container">
    <div id="comments">
        <h2>Solutions</h2>
        <?php 
            $display="";
            if(count($assignments)>0){
                $display="display:none;";
            }
                
            ?>
        <h4 style="<?=$display?>">No current solutions for this course</h4>
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
                     <form class="form-horizontal"  action="<?= base_url() ?>Teacher/view_solutions" method="post">
                         <input type="hidden" value="<?=$a->post_date?>" name="post_date"/>
                         <button  class="btn" id="submit" name="submit" type="submit" value="Submit">show students' solutions</button>
                     </form>
                </li>
                
                <?php
            }
            ?>
        </ul>

    </div>
    </div>

</div>






