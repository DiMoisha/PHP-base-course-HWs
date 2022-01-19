<?php
    function CheckLogin($login, $password) {
        $userId = 0;
        $userName = "";
        $userEmail = "";
        $userRoleId = 0;
        $userRole = "none";
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

        $result = $dbContext -> query("SELECT * FROM `users` WHERE `login` = '$login' AND `passwd` = '$password'");
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $user = $result -> fetch_assoc();
        $userResult = count($user);

        if ($userResult > 1) {
            $userId = $user['userid'];
            $userName = $user['username'];
            $userEmail = $user['email'];
            $result = $dbContext -> query("SELECT r.roleid, r.rolename FROM `roles` `r` INNER JOIN `userroles` `u` ON r.roleid = u.roleid WHERE u.userid = $userId LIMIT 1");
            if(!$result){
                die(mysqli_error($dbContext));
            }
            $user = $result -> fetch_assoc();
            if (count($user) > 1) {
                $userRoleId = $user['roleid'];
                $userRole = $user['rolename'];
            }
        }

        return [$userResult, $userId, $userName, $userEmail, $userRoleId, $userRole];
    }

    function RegisterLogin($login, $password, $userName, $email) {
        $userId = 0;
        $userRoleId = 2;
        $userRole = "Пользователь";
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

        $result = $dbContext -> query("SELECT * FROM `users` WHERE `login` = '$login'");
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $user = $result -> fetch_assoc();
        $userResult = count($user);

        if(!empty($user)) {
            return [-1, $userId, $userName, $email, $userRoleId, $userRole];
        }

        $result = $dbContext -> query("INSERT INTO `users` (`login`, `username`, `email`, `passwd`) VALUES ('$login', '$userName', '$email', '$password');");
        if(!$result){
            die(mysqli_error($dbContext));
        }
               
        if($result > 0) {
            $userId = mysqli_insert_id($dbContext);
        }
      
        return [$userResult, $userId, $userName, $email, $userRoleId, $userRole];
    }

    function RemoveLogin($login, $password) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

        $result = $dbContext -> query("DELETE FROM  `users` WHERE `login` = '$login' AND `passwd` = '$password'");
        if(!$result){
            die(mysqli_error($dbContext));
        }
        return $result;
    }