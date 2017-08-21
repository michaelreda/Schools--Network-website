
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="<?=base_url()?>Home">Education Ministry</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="<?=base_url()?>Home">Home</a></li>
        <?php
            $display="display:none";
            if($this->session->user_type == "student"){
                $display="";
            }
        ?>
        <li style="<?=$display?>"><a href="<?=base_url()?>Student">my panel</a></li>
         <?php
            $display="display:none";
            if($this->session->user_type == "parent"){
                $display="";
            }
        ?>
        <li style="<?=$display?>"><a href="<?=base_url()?>Parents">my panel</a></li>
        <?php
            $display="display:none";
            if($this->session->user_type == "admin"){
                $display="";
            }
        ?>
        <li style="<?=$display?>"><a href="<?=base_url()?>Admin">my panel</a></li>
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
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

