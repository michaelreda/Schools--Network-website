
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>Student/update_profile" method="post">
                    <fieldset>
                
                    

                        <!-- Form Name -->
                        <legend>Update my profile</legend>

                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="first_name">First name</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="first_name" type="text" placeholder="First name" value="<?=$child_info->first_name?>" class="form-control input-md">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="last_name">Last name</label>  
                            <div class="col-md-4">
                                <input id="last_name" name="last_name" type="text" placeholder="Last name" value="<?=$child_info->last_name?>" class="form-control input-md">

                            </div>
                        </div>
                       
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password</label>  
                            <div class="col-md-4">
                                <input id="password" name="password" type="text" value="<?=$student_info->password?>" class="form-control input-md">

                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password</label>  
                            <div class="col-md-4">
                                <input id="password" name="password" type="text" value="<?=$student_info->password?>" class="form-control input-md">

                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="birth_date">Birth date</label>  
                            <div class="col-md-4">
                                <input id="birth_date" name="birth_date" type="text" value="<?=$child_info->birth_date?>" class="form-control input-md">

                            </div>
                        </div>


                        
                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Edit</button>
                                </div>

                            </div>
                        </center>
                    
                
                </form>

            
        </center>
    </div>
</div>






