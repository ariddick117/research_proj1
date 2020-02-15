<?php
function login($username, $password, $ip){
    // return sprintf('You are trying username=>%s, password=>%s', $username, $password);

    $pdo = Database::getInstance()->getConnection();
    // Check existence of the user
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    if($user_set->fetchColumn()>0){
        // Check if value matches anything in the database
        $check_match_query = 'SELECT * FROM tbl_user WHERE user_name =:username';
        $check_match_query .= ' AND user_pass=:password';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );

        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $id = $founduser['user_id'];

            //update date and time in database
            $date = date_default_timezone_set("America/Toronto");
            $date = date("Y-m-d h:i:s");
            //TODO: update the user table and set the user_ip column to be $ip
            $update = 'UPDATE tbl_user SET user_ip=:ip WHERE user_id = :id';
            $user_update = $pdo->prepare($update);
            $user_update->execute(
                array(
                    ':ip'=>$ip,
                    ':id'=>$id
                )
            );

            $update_time_query = 'UPDATE tbl_user SET last_activity = :curr_date WHERE user_id = :id';
            $update_time_set = $pdo->prepare($update_time_query);
            $update_time_set->execute(
                array(
                    ':id'=>$id,
                    ':curr_date'=>$date
                    )
            );
        }

        if(isset($id)){
            //return 'You logged in successfully';
            redirect_to('index.php');
            //update login time
            // $date = date('Y-m-d H:i:s');
            // mysql_query("INSERT INTO tbl_user (last_activity) VALUES ('$date')");
            //$login_time_query = 'UPDATE tbl_user SET last_activity = ".time()." WHERE id = user_id';
        }else{
            return 'Your Password is Incorrect';
        }
    }else{
        return 'User does not exist';
    }
}