<?php
    function GetList() {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Models/ReviewModel.php";

        $result = $dbContext -> query("SELECT `reviewid`, `insdate`, `username`, `useremail`, `reviewtext` FROM `reviews` ORDER BY `insdate` DESC");
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $reccount = mysqli_num_rows($result);
        $reviews = [];

        for($i = 0; $i < $reccount; $i ++) {
            $row = mysqli_fetch_assoc($result);
            $reviews[] = (new ReviewViewModel) -> Set($row['reviewid'], $row['insdate'], $row['username'], $row['useremail'], $row['reviewtext']);
        }

        return $reviews;
    }

    function CreateReview($review) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        $sql = "INSERT INTO `reviews`(`username`, `useremail`, `reviewtext`) VALUES ('%s','%s','%s')";
        $query = sprintf($sql, mysqli_real_escape_string($dbContext, $review -> userName), mysqli_real_escape_string($dbContext, $review -> userEmail), mysqli_real_escape_string($dbContext, $review -> reviewText));
        $result = mysqli_query($dbContext, $query);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        return $result;
    }