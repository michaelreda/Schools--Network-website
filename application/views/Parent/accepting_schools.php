
<div class="wrapper row3">
<div class="container">
    <div id="comments">
        <h2>Schools</h2>
        <?php
        $display = "";
        if (count($schools) > 0) {
            $display = "display:none;";
        }
        ?>
        <h4 style="<?= $display ?>">No schools accepted your child</h4>
        <ul>
            <?php
            foreach ($schools as $c) {
                ?>
                <li>
                    <article>
                        <header>

                            <address>
                                <?= $c->school_name ?>

                            </address>

                        </header>
                        <div class="comcont">
                            
                            <p><?= $c->school_address ?></p>
                            <p><?= $c->first_name ?></p>
                            
                        </div>
                        <form class="form-horizontal"  action="<?= base_url() ?>Parents/choose_school" method="post">
                            <input type="hidden" name="school_name" value="<?=$c->school_name  ?>"/>
                            <input type="hidden" name="school_address" value="<?=$c->school_address  ?>"/>
                           <input type="hidden" name="child_ssn" value="<?=$c->child_ssn  ?>"/>
                           
                            
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="grade">Grade</label>
                            <div class="col-md-4">
                                <select id="grade" name="grade" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>

                            
                            <!-- Button -->
                                <div class="form-group">

                                    <div class="col-md-4" style="float:none;">
                                        <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Enroll</button>
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
