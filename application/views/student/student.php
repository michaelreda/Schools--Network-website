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
                <article><a href="<?= base_url() ?>Student/view_profile"><i class="icon btmspace-30 fa fa-user"></i></a>
                    <h6 class="heading font-x1">my profile</h6>
                    <p>view your profile information and update it</p>
                </article>
            </li>
            <li class="one_third">
                <article><a href="<?= base_url() ?>Student/view_my_courses"><i class="icon btmspace-30 fa fa-book"></i></a>
                    <h6 class="heading font-x1">my courses</h6>
                    <p>view courses you are enrolled in</p>
                </article>
            </li>
            <li class="one_third">
                <article><a href="<?= base_url() ?>Student/view_ask_question"><i class="icon btmspace-30 fa fa-question"></i></a>
                    <h6 class="heading font-x1">Ask a question</h6>
                    <p>choose a course to post a question about it, where a teacher would later answer.</p>

                </article>
            </li>
            <li class="one_third first">
                <form  class="form-horizontal"  action="<?= base_url() ?>Student/view_questions_in_course" method="post">
                    <fieldset>
                        <article><a onclick="$(this).closest('form').submit()" style="
                                    cursor: pointer;
                                    "><i class="icon btmspace-30 fa fa-question"><i class="fa fa-check"></i></i></a>
                            <h6 class="heading font-x1">View questions answered in a course</h6>
                            <p>View all questions asked on a certain course along with their answers.</p>

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
            <li class="one_third">
                <form class="form-horizontal"  action="<?= base_url() ?>Student/view_assignments_in_course" method="post">

                    <article><a onclick="$(this).closest('form').submit()" style="
                                cursor: pointer;
                                "><i class="icon btmspace-30 fa fa-file-text-o"></i></a>
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
                <form class="form-horizontal"  action="<?= base_url() ?>Student/view_submit_assignment" method="post">

                    <article><a onclick="$(this).closest('form').submit()" style="
                                cursor: pointer;
                                "><i class="icon btmspace-30 fa fa-paper-plane-o"></i></a>
                        <h6 class="heading font-x1">Submit assignments solution</h6>
                        <p>Submit your solution for an assignment in a course.</p>

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
            <li class="one_third first">
                <article><a href="<?= base_url() ?>Student/view_grades"><i class="icon btmspace-30 fa fa-list-ol"></i></a>
                    <h6 class="heading font-x1">view my assignment grades</h6>
                    <p>View my assignments grades per course</p>

                </article>
            </li>
            <li class="one_third">
                <article><a href="<?= base_url() ?>Student/view_activities"><i class="icon btmspace-30 fa fa-users"></i></a>
                    <h6 class="heading font-x1">view activities in my school</h6>
                    <p>View a list of activities offered by the school then you can join any activity.</p>
                </article>
            </li>
            <?php
            $display = "display:none";
            if (($this->session->grade) > 9) {
                $display = "";
            }
            ?>
            <li style="<?= $display ?>" class="one_third">
                <article><a href="<?= base_url() ?>Student/view_clubs"><i class="icon btmspace-30 fa fa-bicycle"></i></a>
                    <h6 class="heading font-x1">view clubs in my school</h6>
                    <p>view a list of clubs in his/her school and join any of them.</p>
                </article>
            </li>
        </ul>
    </div>
</div>
