
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>Admin/create_activity" method="post">
                    <fieldset>
                
                    

                        <!-- Form Name -->
                        <legend>Create Activity</legend>

                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="date">Date</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="date" type="text" placeholder="Date"  class="form-control input-md">

                            </div>
                        </div>
                       
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="location">Location</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="location" type="text" placeholder="Location"  class="form-control input-md">

                            </div>
                        </div>

                             <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="description">Description</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="first_name" name="description"  rows="5"></textarea>
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="type">Type</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="type" type="text" placeholder="Type"  class="form-control input-md">

                            </div>
                        </div>

                         
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="equipment">Equipment</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="first_name" name="equipment"  rows="5"></textarea>
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="teacher">Teacher ID</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="teacher" type="text" placeholder="Teacher_id"  class="form-control input-md">

                            </div>
                        </div>
                        
                        
                        
                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Create</button>
                                </div>

                            </div>
                        </center>
                    
                


            
        </center>
    </div>
</div>






