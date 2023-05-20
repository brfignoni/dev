<?php
    function validate_user_data($function) {
        if(isset($_POST["username"]) and isset($_POST["password"])) {
            global $username;
            global $password;
            global $username_min_length;
            global $username_max_length;
            global $password_max_length;
            global $password_min_length; 
            global $messages;
            $username = $_POST["username"];
            $password = $_POST["password"];

            if(
                !(strlen($username) < $username_min_length) and
                !(strlen($username) > $username_max_length) and
                !(strlen($password) < $password_min_length) and 
                !(strlen($password) > $password_max_length) 
            ) {
                //echo "usename and passwords are valid";
                $function($username, $password);
            } else {
                //echo "usename and passwords are NOT valid";
                $message = (object) [
                    'message' => 'username or password are not correct.',
                    'type' => 'danger'
                ];
                array_push($messages,$message);
                echo "no id provided";
            }
        }
    }

    function users_select($result){
        $buffer = '<select class="form-select" id="users-id-select"><option>Select user id</option>';
        while($row = mysqli_fetch_assoc($result)) {
            $buffer .= '<option data-id='.$row["id"].' data-username="'.$row["username"].'" data-password="'.$row["password"].'" value="'.$row["id"].'">'.$row["id"].'</option>';
        }
        $buffer .= '</select>';
        return $buffer;
    }

    function validate_user_id($id){
        global $connection;
        if($id) {
            $query = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($connection, $query);
            if($result->num_rows) {
                //user exists in database
                return true;
            }
        } else {
            return false;
        }
    }
?>
