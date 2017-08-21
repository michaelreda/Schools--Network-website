<div class="container">
    <div class="panel-group" id="accordion">
        <?php
        $i=0;
        foreach ($courses as $c) {
            $i++;
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>">
                            <?=$c->name?></a>
                    </h4>
                </div>
                <div id="collapse<?=$i?>" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <table class="searchTable">
                            <thead>
                                <tr>
                                    <th>Assignment</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($grades as $g){
                                    if($g->course_code == $c->course_code){
                                ?>
                                <tr>
                                    <td><?=$g->title?></td>
                                    <td><?=$g->score?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>

