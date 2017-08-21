
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>ParentSignup/signup" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Parent Sign Up</legend>

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
                            <label class="col-md-4 control-label" for="parent_ssn">SSN</label>  
                            <div class="col-md-4">
                                <input id="child_ssn" name="parent_ssn" type="text" placeholder="SSN" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="username">User Name</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="username" type="text" placeholder="User name" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="password" type="password" placeholder="Password" class="form-control input-md" required="">

                            </div>
                        </div>
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="address">Address</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="address" type="text" placeholder="Address" class="form-control input-md" required="">

                            </div>
                        </div>
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="email" type="text" placeholder="email" class="form-control input-md" required="">

                            </div>
                        </div>
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="home_num">Phone Number</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="home_num" type="text" placeholder="Home numnber" class="form-control input-md" required="">

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






