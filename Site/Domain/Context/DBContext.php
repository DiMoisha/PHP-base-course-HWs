<?php
    require_once LOCAL_PATH_ROOT."/config.php";

    $dbContext = mysqli_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB) or die("Error: ".mysqli_error($dbContext));
    if(!mysqli_set_charset($dbContext, "utf8")){
        printf("Error: ".mysqli_error($dbContext));
    }