
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>Admin/assign_teachers_to_courses" method="post">
                    <fieldset>



                        <!-- Form Name -->
                        <legend>Assign teacher to a Course </legend>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="course">Course</label>  
                            <div class="col-md-4">
                                <select name="course" type="text"  class="form-control input-md">
                                    <?php
                                    foreach ($courses as $c) {
                                        ?>
                                    <option value="<?=$c->course_code?>"><?=$c->name?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>



                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="teacher">Teacher</label>  
                            <div class="col-md-4">
                                <select name="teacher" type="text"  class="form-control input-md">
                                    <?php
                                    foreach ($teachers as $t) {
                                        ?>
                                    <option value="<?=$t->employee_id?>"><?=$t->first_name?> <?=$t->middle_name?> <?=$t->last_name?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>



                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Assign</button>
                                </div>

                            </div>
                        </center>





                        </center>
                        </div>
                        </div>






