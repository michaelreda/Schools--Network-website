
<div class="wrapper row3" style="
     width: 80%;
     padding-left: 300px;
     ">

    <form class="form-horizontal"  action="<?= base_url() ?>Student/ask_question" method="post">

        <div class="form-group">
            <label for="course">Select course:</label>
            <select class="form-control" id="course_code" name="course_code">
                <?php foreach ($courses as $c) {
                    ?>
                    <option value="<?= $c->course_code ?>"><?= $c->name ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="question">Question: </label>
            <textarea class="form-control" id="question" name="question" rows="3" placeholder="ask your question here..."></textarea>
        </div>

        <div class="form-group" style="
             padding-left: 50%;
             ">
            <button  class="btn" id="submit" name="submit" type="submit" value="Submit">Ask</button>
        </div>
    </form>



</div>






