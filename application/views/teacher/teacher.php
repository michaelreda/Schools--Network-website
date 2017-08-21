<div class="container">
    <style> 
        .row{
            display: -webkit-box;
            padding-left: 60px;
            padding-bottom: 30px;
        }
    </style>
    <div class="wrapper row3">
        <ul class="nospace group">
            
            <li class="one_third first">
                <article><a href="<?= base_url() ?>Teacher/view_courses"><i class="icon btmspace-30 fa fa-book"></i></a>
                    <h6 class="heading font-x1"> Courses</h6>
                    <p>view courses you are teaching</p>
                </article>
            </li>
            <li class="one_third">
                <article><a href="<?= base_url() ?>Teacher/view_post_assignment"><i class="icon btmspace-30 fa fa-file-text-o"></i></a>
                    <h6 class="heading font-x1">Post an Assignment</h6>
                    <p>choose a course to post an assignment about it.</p>

                </article>
            </li>
            <li class="one_third ">
                <form  class="form-horizontal"  action="<?= base_url() ?>Teacher/view_write_report" method="post">
                    <fieldset>
                        <article><a onclick="$(this).closest('form').submit()" style="
                                    cursor: pointer;
                                    "><i class="icon btmspace-30 fa fa-pencil"></i></a>
                            <h6 class="heading font-x1">Write report</h6>
                            <p>Write a report for a certain student you are teaching.</p>

                            <div class="form-group">
                                <label for="course">Select course:</label>
                                <select class="form-control"  name="course_code" >
                                    <?php foreach ($courses as $c) {
                                        ?>
                                        <option value="<?= $c->course_code ?>" ><?= $c->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </article>
                    </fieldset>
                </form>
            </li>
            <li class="one_third first">
                <form class="form-horizontal"  action="<?= base_url() ?>Teacher/view_assignments_in_course" method="post">

                    <article><a onclick="$(this).closest('form').submit()" style="
                                cursor: pointer;
                                "><i class="icon btmspace-30 fa fa-files-o"></i></a>
                        <h6 class="heading font-x1">View assignments in a course</h6>
                        <p>View assignments posted about a course</p>
                        
                        <div class="form-group">
                            <label for="course">Select course:</label>
                            <select class="form-control"  name="course_code">
                                <?php foreach ($courses as $c) {
                                    ?>
                                    <option value="<?= $c->course_code ?>"><?= $c->name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                    </article>
                </form>
            </li>

            <li class="one_third ">
                <form class="form-horizontal"  action="<?= base_url() ?>Teacher/view_questions" method="post">

                    <article><a onclick="$(this).closest('form').submit()" style="
                                cursor: pointer;
                                "><i class="icon btmspace-30 fa fa-question"><i class="fa fa-check"></i></i></a>
                        <h6 class="heading font-x1">Submit questions' answer</h6>
                        <p>write down the answer.</p>

                        <div class="form-group">
                            <label for="course">Select course:</label>
                            <select class="form-control"  name="course_code">
                                <?php foreach ($courses as $c) {
                                    ?>
                                    <option value="<?= $c->course_code ?>"><?= $c->name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </article>
                </form>
            </li>
            
            <li class="one_third ">
                <article><a href="<?= base_url() ?>Teacher/view_students"><i class="icon btmspace-30 fa fa-users"></i></a>
                    <h6 class="heading font-x1">view my students</h6>
                    <p>View a list of students that i teach and order them by their grade and names.</p>
                </article>
            </li>
            
           
        </ul>
    </div>
</div>
