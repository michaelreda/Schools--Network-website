
<div class="wrapper row3" style="
     width: 80%;
     padding-left: 300px;
     ">

    <form class="form-horizontal"  action="<?= base_url() ?>Teacher/post_assignment" method="post">

       
          <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="course_code">Course</label>  
            <div class="col-md-4">
                <select id="first_name" name="course_code" type="text" placeholder="Course" class="form-control input-md">
                    <?php
                    foreach ($courses as $c){
                    ?>
                    <option value="<?= $c->course_code ?>"><?= $c->name ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        
         <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="title">Title</label>  
            <div class="col-md-4">
                <input id="title" name="title"  placeholder="Title" class="form-control input-md">

            </div>
        </div>
         
        <div class="form-group">
            <label class="col-md-4 control-label" for="date">Due Date</label>  
            <div class="col-md-4">
                <input id="first_name" name="date" type="datetime" placeholder="Due Date" class="form-control input-md">

            </div>
        </div>

        <div class="form-group">
            <label for="assignment">Assignment: </label>
            <textarea class="form-control" id="assignment" name="assignment" rows="5" placeholder="Write assignment here"></textarea>
        </div>

        <div class="form-group" style="
             padding-left: 50%;
             ">
            <button  class="btn" id="submit" name="submit" type="submit" value="Submit">Post</button>
        </div>
    </form>



</div>






