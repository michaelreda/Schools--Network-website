
<div class="wrapper row3">

    <div class="container">

        <center>
            <div id="content">
                <form class="form-horizontal"  action="<?= base_url() ?>Admin/edit_school" method="post">
                    <fieldset>
                
                    

                        <!-- Form Name -->
                        <legend>Edit School info</legend>

                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="name" type="text" placeholder="Name" value="<?=$info[0]->school_name?>" class="form-control input-md">

                            </div>
                        </div>
                       
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="address">Address</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="address" type="text" placeholder="Address" value="<?=$info[0]->school_address?>" class="form-control input-md">

                            </div>
                        </div>

                                                <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="phone">Phone</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="phone" type="text" placeholder="Phone" value="<?=$info[0]->phone_number?>" class="form-control input-md">

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="info">Info</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="info" name="info"  rows="5"><?=$info[0]->general_info?></textarea>
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">E-mail</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="email" type="text" placeholder="E-mail" value="<?=$info[0]->email?>" class="form-control input-md">

                            </div>
                        </div>

                                                
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="type">Type</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="type" type="text" placeholder="Type" value="<?=$info[0]->type?>" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="language">Language</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="language" type="text" placeholder="Language" value="<?=$info[0]->main_language?>" class="form-control input-md">

                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="vision">Vision</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="vision" name="vision"  rows="5"><?=$info[0]->vision?></textarea>
                            </div>
                        </div>

                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mission">Mission</label>  
                            <div class="col-md-4">
                                <textarea class="form-control" id="mission" name="mission"  rows="5"><?=$info[0]->mission?></textarea>
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="url">URL</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="url" type="text" placeholder="URL" value="<?=$info[0]->URL?>" class="form-control input-md">

                            </div>
                        </div>
                        
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fees">Fees</label>  
                            <div class="col-md-4">
                                <input id="first_name" name="fees" type="int" placeholder="Fees" value="<?=$info[0]->fees?>" class="form-control input-md">

                            </div>
                        </div>
                        
                        
                        <!-- Button --><center>
                            <div class="form-group">

                                <div class="col-md-4" style="float:none;">
                                    <button id="submit" name="submit" class="btn btn-success" type="submit" value="Submit">Edit</button>
                                </div>

                            </div>
                        </center>
                    
                


            
        </center>
    </div>
</div>






