
<div class="wrapper row3">
    <style>
        h2{
            
    padding-top: 5px;
    padding-left: 20px;

        }
        .row{
    display: -webkit-box;
    padding-left: 60px;
    padding-bottom: 30px;
        }
    </style>
      
            <div id="content">
                <div class="row">
                <h1>Name: </h1>
                <h2> <strong><?=$this->session->name?></strong></h2>
                </div>
            </div>
    
              <div id="content">
                <div class="row">
                <h1>Username: </h1>
                <h2> <strong><?=$student_info->username?></strong></h2>
                </div>
            </div>
    
     <div id="content">
                <div class="row">
                <h1>Password: </h1>
                <h2> <strong><?=$student_info->password?></strong></h2>
                </div>
            </div>
       
     <div id="content">
                <div class="row">
                <h1>Birth date: </h1>
                <h2> <strong><?=$child_info->birth_date?></strong></h2>
                </div>
            </div>
    
    
    
</div>






