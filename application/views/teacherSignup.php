
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>TeacherSignup/signup" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Teacher Sign Up</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="first_name">First Name</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="middle_name">Middle Name</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="middle_name" type="text" placeholder="Middle Name" class="form-control input-md">

                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="last_name">Last Name</label>  
                            <div class="col-md-4">
                                <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="birth_date">Birth Date</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="birth_date" type="text" placeholder="Y-M-D" class="form-control input-md" required="">

                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="address">Address</label>  
                            <div class="col-md-4">
                                <input id="child_ssn" name="address" type="text" placeholder="Address" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="email" type="text" placeholder="Email" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="gender">Gender</label>
                            <div class="col-md-4">
                                <select id="gender" name="gender" class="form-control">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- Search input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="school_name">School</label>
                            <div class="col-md-4">
                                <select id="school_name" name="school_name" class="form-control">
                                    <?php foreach ($schools as $school) { ?>    
                                        <option value="<?= $school->school_name ?>"><?= $school->school_name ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="school_name">School Address</label>
                            <div class="col-md-4">
                                <select id="school_address" name="school_address" class="form-control">
                                    <?php foreach ($schools as $school) { ?>    
                                        <option value="<?= $school->school_address ?>"><?= $school->school_address ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>

                        

                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Sign Up</button>
                                </div>

                            </div>
                        </center>
                    </fieldset>
                </form>


            </div>
        </center>
    </div>
</div>






