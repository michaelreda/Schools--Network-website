
<div class="wrapper row3" style="
     width: 80%;
     padding-left: 300px;
     ">

    <form class="form-horizontal"  action="<?= base_url() ?>Admin/post_announcement" method="post">


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="title">Title</label>  
            <div class="col-md-4">
                <input id="first_name" name="title" type="text" placeholder="Title" class="form-control input-md">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="type">Type</label>  
            <div class="col-md-4">
                <input id="first_name" name="type" type="text" placeholder="type of announcement" class="form-control input-md">

            </div>
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea class="form-control" id="question" name="description" rows="5" placeholder="write the description here..."></textarea>
        </div>

        <div class="form-group" style="
             padding-left: 50%;
             ">
            <button  class="btn" id="submit" name="submit" type="submit" value="Submit">Post</button>
        </div>
    </form>



</div>






