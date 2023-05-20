<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "login_head.php"; ?>
    <title>Login - Create</title>
</head>
<body>
    <?php
        include 'common_vars.php';
        include 'functions.php';

        if(isset($_POST["submit"])) {

            function code_to_execute($username, $password){
                global $username;
                global $password;
                
                include 'connection.php';
                global $messages;
                $users_already_exists = false;

                //check if user already exists
                $query = "SELECT * FROM users WHERE username = '$username' ";
                $result = mysqli_query($connection, $query);
                if($result->num_rows) {
                    $users_already_exists = true;
                }
                //if it does not exists, save user in the database
                if(!$users_already_exists){
                    $query = "INSERT INTO users(username,password) VALUES ('$username','$password')";
                    $result = mysqli_query($connection, $query);
                    if($result) {
                        //user was registered succesfully
                        $username = '';
                        $password = '';
                        $message = (object) [
                            'message' => 'username was succesfully registered.',
                            'type' => 'success'
                        ];
                        array_push($messages,$message);
                    }
                } else {
                    //username already exists
                    $message = (object) [
                        'message' => 'username already exists. Please, choose a different username.',
                        'type' => 'danger'
                    ];
                    array_push($messages,$message);
                }
            }
            validate_user_data('code_to_execute');
        }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mb-4">Sign Up</h1>
                <?php include "login_form.php"; ?>
            </div>
        </div>
    </div>
    
</body>
</html>