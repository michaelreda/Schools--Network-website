
<!-- loader -->


<body id="top">
    <div class="se-pre-con"></div>
    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(<?= base_url() ?>images/loading.gif) center no-repeat #fff;
        }
    </style>
    <script src="<?= base_url() ?>js/jquery.min.js"></script>
    <script src="<?= base_url() ?>js/modernizr.js"></script>

    <script>
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
            ;
        });
    </script>
