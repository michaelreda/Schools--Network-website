

<div class="wrapper row3">
    <main class="hoc container clear"> 
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="two_third first">
            <p class="heading font-x3">Our Schools
            <p class="btmspace-50">All schools in Egypt are Highly established to keep up with the whole world development</p>
            <input type="text" id="school_Input" class="searchInput" onkeyup="myFunction()" placeholder="Search for Schools by name,address or type">
            
            <h3>Elimentary Schools</h3> <table class="searchTable" id="Elimentary_school_Table">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>address</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Schools as $s) {
                        if ($s->level == "Elimentary") {
                            ?>
                            <tr>
                                <td><?= $s->school_name ?></td>
                                <td><?= $s->school_address ?></td>
                                <td style="
                                    width: 175.6px;
                                    ">
                                    <a href="<?= base_url() ?>School/view_school_info/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><span class="fa fa-info" aria-hidden="true"></span></a>
                                    <a href="<?= base_url() ?>School/view_school_reviews/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                                    <a href="<?= base_url() ?>School/view_school_announcements/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><span class="fa fa-bullhorn" aria-hidden="true"></span></a>
                                </td>         
                                <td style="display:none"><?= $s->type ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <h3>Middle Schools</h3> 
            <table class="searchTable" id="Middle_school_Table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>address</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Schools as $s) {
                        if ($s->level == "Middle") {
                            ?>
                            <tr>
                                <td><?= $s->school_name ?></td>
                                <td><?= $s->school_address ?></td>
                                <td style="
                                    width: 175.6px;
                                    ">
                                    <a href="<?= base_url() ?>School/view_school_info/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><span class="fa fa-info" aria-hidden="true"></span></a>
                                    <a href="<?= base_url() ?>School/view_school_reviews/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                                    <a href="<?= base_url() ?>School/view_school_announcements/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><span class="fa fa-bullhorn" aria-hidden="true"></span></a>
                                </td> 
                                <td style="display:none"><?= $s->type ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <h3>High Schools</h3>
            <table class="searchTable" id="High_school_Table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>address</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Schools as $s) {
                        if ($s->level == "High") {
                            ?>
                            <tr>
                                <td><?= $s->school_name ?></td>
                                <td><?= $s->school_address ?></td>
                                <td style="
                                    width: 175.6px;
                                    ">
                                    <a href="<?= base_url() ?>School/view_school_info/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><span class="fa fa-info" aria-hidden="true"></span></a>
                                    <a href="<?= base_url() ?>School/view_school_reviews/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                                    <a href="<?= base_url() ?>School/view_school_announcements/<?= $s->school_name ?>/<?= $s->school_address ?>" class="btn"><span class="fa fa-bullhorn" aria-hidden="true"></span></a>
                                </td> 
                                <td style="display:none"><?= $s->type ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <div class="one_third"><a href="#"><img src="images/student on computer.jpg" alt=""></a></div>
        <!-- ################################################################################################ -->
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>

<style>

    /*search table and input*/
    .searchInput {
        background-image: url('/css/searchicon.png'); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }

    .searchTable {
        border-collapse: collapse; /* Collapse borders */
        width: 100%; /* Full-width */
        border: 1px solid #ddd; /* Add a grey border */
        font-size: 18px; /* Increase font-size */
    }

    .searchTable th, .searchTable td {
        text-align: left; /* Left-align text */
        padding: 12px; /* Add padding */
    }

    .searchTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd; 
    }

    .searchTable tr.header, #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #f1f1f1;
    }



</style>

<script>
    function myFunction() {
        // Declare variables 
        var input, filter, table, tr, td, i;
        input = document.getElementById("school_Input");
        filter = input.value.toUpperCase();
        if (filter != "NATIONAL" && filter != "INTERNATIONAL") {
            table = document.getElementById("Elimentary_school_Table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                console.log(td);
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    console.log("1");
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            table = document.getElementById("Middle_school_Table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            table = document.getElementById("High_school_Table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        if (filter == "NATIONAL" || filter == "INTERNATIONAL") {
            table = document.getElementById("Elimentary_school_Table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    if (td.innerHTML.toUpperCase() == filter) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            table = document.getElementById("Middle_school_Table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    if (td.innerHTML.toUpperCase() == filter) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

            table = document.getElementById("High_school_Table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    if (td.innerHTML.toUpperCase() == filter) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

</script>
