<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "login_head.php"; ?>
    <title>Login - Update</title>
</head>
<body>
    <?php
        include 'common_vars.php';
        include 'functions.php';
        include 'connection.php';
        //connected

        //retrieve all users from database
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        if($result->num_rows) {
            $users_select = users_select($result);
        }

        if(isset($_POST["submit"])) {

            function code_to_execute($username, $password){
                global $username;
                global $password;
                global $connection;
                global $messages;

                if(!isset($_POST["id"])) {
                    $message = (object) [
                        'message' => 'A user id was not provided.',
                        'type' => 'danger'
                    ];
                    array_push($messages,$message);
                } else {
                    $id = $_POST["id"];
                    $user_exists = validate_user_id($_POST["id"]);
                    if($user_exists) {
                        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
                        $result = mysqli_query($connection, $query);
                        if($result) {
                            $message = (object) [
                                'message' => 'User was updated successfully.',
                                'type' => 'success'
                            ];
                            array_push($messages,$message);
                            $username = '';
                            $password = '';
                        } else {
                            $message = (object) [
                                'message' => 'User could not be updated.',
                                'type' => 'danger'
                            ];
                            array_push($messages,$message);
                        }
                    } else {
                        $message = (object) [
                            'message' => 'User with the provided id does no exists.',
                            'type' => 'danger'
                        ];
                        array_push($messages,$message);
                    }
                }
            }
            validate_user_data('code_to_execute');
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mb-4">Update</h1>
                <?php include "login_form.php"; ?>
            </div>
        </div>
    </div>
    <script src="./update-form.js"></script>
</body>
</html>