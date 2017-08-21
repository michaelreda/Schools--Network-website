<!-- Top Background Image Wrapper -->
<?php
    if($this->session->user_type=="teacher")
        $img="teacher.jpg";
    else if($this->session->user_type=="student")
        $img="student.jpg";
     else if($this->session->user_type=="parent")
        $img="parent.jpg";
    else
        $img="admin.png"
?>
<div class="bgded overlay" style="background-image:url('<?=base_url()?>images/<?=$img?>');background-size: cover;"> 
    
    <div class="wrapper row0">
        <div id="topbar" style="height: 400px;" class="hoc clear"> 
            
            <div class="fl_left">
                <ul>
                    <li><i class="fa fa-phone"></i>19 666</li>
                    <li><i class="fa fa-envelope-o"></i> Edu_eg@gmail.com</li>
                </ul>
            </div>
            
        </div>
    </div>
   
</div>
<!-- End Top Background Image Wrapper -->