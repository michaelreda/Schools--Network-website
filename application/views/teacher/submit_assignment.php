
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>Student/submit_assignment" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>submit assignment</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="first_name">Assignment</label>  
                            <div class="col-md-4">
                                 <select id="assignment" name="post_date" class="form-control">
                                    <?php foreach ($assignments as $a) { ?>    
                                        <option value="<?= $a->post_date ?>"><?= $a->title ?> due date:<?=$a->due_date?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="answer">Your Answer</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="answer" name="answer" rows="10"></textarea>
                            </div>
                        </div>

                        
                        <input type="hidden" name="course_code" value="<?=$course_code?>"/>
                        
                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Submit</button>
                                </div>

                            </div>
                        </center>
                    </fieldset>
                </form>


            </div>
        </center>
    </div>
</div>






