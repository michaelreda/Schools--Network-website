
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>Parents/apply_for_child" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Child Application</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="first_name">First Name</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md">

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
                            <label class="col-md-4 control-label" for="child_ssn">SSN</label>  
                            <div class="col-md-4">
                                <input id="child_ssn" name="child_ssn" type="text" placeholder="SSN" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="birth_date">Birth Date</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="birth_date" type="text" placeholder="Y-M-D" class="form-control input-md" required="">

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

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="school_name">School name</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="school_name" type="text" placeholder="School Name" class="form-control input-md" required="">

                            </div>
                        </div>
                    
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="school_address">School address</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="school_address" type="text" placeholder="School Address" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Apply</button>
                                </div>

                            </div>
                        </center>
                    </fieldset>
                </form>


            </div>
        </center>
    </div>
</div>






