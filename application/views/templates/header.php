<!DOCTYPE HTML>

<html>
    <head>
        <title>Education Ministry</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=700, initial-scale=1" />
        <link rel="stylesheet" href="<?= base_url() ?>css/main.css" />
        <link rel="stylesheet" href="<?= base_url() ?>css/hover.css" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    
    <!-- loader -->
    <style>
            
           
            
            #loader{
                display:block;
                z-index: 5000;
                position:fixed;
                
                left:60%;
                top:50%;
                margin-left: -250px;
                margin-top: -80px;
            }
            #loader-wrapper .loader-section {
                position: fixed;
                width: 51%;
                height: 100%;
                background: #fff;
                z-index: 1000;
                -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateX(0);  /* IE 9 */
                transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
            }

            #loader-wrapper .loader-section.section-left {
                left: 0;
            }

            #loader-wrapper .loader-section.section-right {
                right: 0;
            }

            /* Loaded */
            .loaded #loader-wrapper .loader-section.section-left {
                -webkit-transform: translateX(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateX(-100%);  /* IE 9 */
                transform: translateX(-100%);  /* Firefox 16+, IE 10+, Opera */

                -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
            }

            .loaded #loader-wrapper .loader-section.section-right {
                -webkit-transform: translateX(100%);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateX(100%);  /* IE 9 */
                transform: translateX(100%);  /* Firefox 16+, IE 10+, Opera */

                -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
            }

            .loaded #loader {
                opacity: 0;
                -webkit-transition: all 0.3s ease-out;  
                transition: all 0.3s ease-out;
            }
            .loaded #loader-wrapper {
                visibility: hidden;

                -webkit-transform: translateY(-120%);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateY(-120%);  /* IE 9 */
                transform: translateY(-120%);  /* Firefox 16+, IE 10+, Opera */

                -webkit-transition: all 0.3s 1s ease-out;  
                transition: all 0.3s 1s ease-out;
            }

        </style>
        
        <div id="loader-wrapper">
            
            <img id="loader" src="<?= base_url() ?>images/loading.gif"/> 
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
            
        </div>
        
    
        <!-- Header home button --> 
        <center>
        <header id="header" class="preview">
            <img src="<?=base_url()?>images/header.jpg"/>
        </header>
        </center>
        

        
        <body id="body">





<script src="<?= base_url() ?>js/jquery.min.js"></script>
    <script>
      /*  $(window).load(function (){
                    $('#body').addClass('loaded');
                });*/
                
                 $(window).load(function (){
                    $('#loader-wrapper').fadeOut(1000,function(){
                        $('#page').fadeIn(500);
                    });
                });
        </script>