
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
        <h2>Announcements</h2>
        <?php 
            $display="";
            if(count($announcements)>0){
                $display="display:none;";
            }
                
            ?>
        <h4 style="<?=$display?>">No current announcements for this school</h4>
        <ul>
            <?php
            foreach ($announcements as $a) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $a->type ?>
                                
                            <h5> <?= $a->title ?></h5>
                            
                            <time datetime="<?= $a->date ?>"><?= $a->date ?></time>
                            </address>
                        </header>
                        <div class="comcont">
                            <p><?= $a->description ?></p>
                        </div>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>


</div>






