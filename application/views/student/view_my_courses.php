
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
        <h2>My Courses</h2>
        <?php 
            $display="";
            if(count($courses)>0){
                $display="display:none;";
            }
                
            ?>
        <h4 style="<?=$display?>">No current courses for you</h4>
        <ul>
            <?php
            foreach ($courses as $c) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $c->name ?>
                            </address>

                        </header>
                        
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>

    </div>
</div>






