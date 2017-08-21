<div class="wrapper row4">
    <footer id="footer" class="hoc clear"> 
        <!-- ################################################################################################ -->
        <h3 class="heading">Education Government</h3>
        <ul class="nospace inline pushright uppercase">
            <li><a href="<?= base_url() ?>Home"><i class="fa fa-lg fa-home"></i></a></li>
            <?php
            $display = "display:none";
            if ($this->session->user_type == "student") {
                $display = "";
            }
            ?>
            <li style="<?= $display ?>"><a href="<?= base_url() ?>Student">my panel</a></li>
            <?php
            $display = "display:none";
            if ($this->session->user_type == "parent") {
                $display = "";
            }
            ?>
            <li style="<?= $display ?>"><a href="<?= base_url() ?>Parents">my panel</a></li>
            <?php
            $display = "display:none";
            if ($this->session->user_type == "admin") {
                $display = "";
            }
            ?>
            <li style="<?= $display ?>"><a href="<?= base_url() ?>Admin">my panel</a></li>
             <?php
            $display="display:none";
            if($this->session->user_type == "teacher"){
                $display="";
            }
        ?>
        <li style="<?=$display?>"><a href="<?=base_url()?>Teacher">my panel</a></li>
        <?php
            $display="display:none";
            if($this->session->user_type == "student" || $this->session->user_type == "parent"||$this->session->user_type == "admin"||$this->session->user_type == "teacher"){
                $display="";
            }
        ?>
        <li style="<?=$display?>"><a href="<?=base_url()?>SignOut">Sign out</a></li>

        </ul>
        <!--  <ul class="faico clear">
            <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
          </ul> -->
        <div id="copyright">
            <p>Copyright &copy; 2016 - All Rights Reserved - Michael Reda,Andrea Medhat,Karim Bassem, Michael Morcos</p>
        </div>
        <!-- ################################################################################################ -->
    </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="<?= base_url() ?>js/scripts/jquery.min.js"></script>
<script src="<?= base_url() ?>js/scripts/jquery.backtotop.min.js"></script>
<script src="<?= base_url() ?>js/bootstrap.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>js/scripts/jquery.mobilemenu.js"></script>
<script src="<?= base_url() ?>js/scripts/jquery.flexslider-min.js"></script>
</body>
</html>