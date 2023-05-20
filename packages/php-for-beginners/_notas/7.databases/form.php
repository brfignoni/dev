<?php        
    $username = "";
    $password = "";
    $active_users = [];

    function active_users_options(){
        global $active_users;
        $buffer = '';
        foreach ($active_users as $user) {
            $buffer .= '<option value='.$user["id"].'>'.$user["id"].'</option>';
        }
        return $buffer;
    } 

    if(isset($_POST["submit"]) or isset($_POST["update"])) {
        $users_already_exists = false;
        $username = $_POST["username"];
        $password = $_POST["password"];
        $username_min_length = 5;
        $username_max_length = 10;

        //validation
        if(!(strlen($username) < $username_min_length) and !(strlen($username) > $username_max_length)) {
            
            include 'connection.php';

            if($connection) {   
                //CONNECTED!

                if(isset($_POST["submit"])) {

                } else if (isset($_POST["update"]) and isset($_POST["id"])) {
                    //check if user id exists first
                    $id = $_POST["id"];
                    $query = "SELECT * FROM users WHERE id = '$id' ";
                    $result = mysqli_query($connection, $query);
                    if($result->num_rows) {
                        //user exists
                        //update user
                        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = '$id'";
                        $result = mysqli_query($connection, $query);
                        if($result) {
                            //user updated
                            $current_url = explode("?", $_SERVER['REQUEST_URI']);
                            header('Location: '.$current_url[0].'?user-updated');
                        } else {
                            //user not updated
                        }
                    } else {
                        //user does not exists
                    }
                } 

            } else {
                die("Database connection failed");
            }            
        } 

        //validation
        if(!(strlen($username) < $username_min_length) and !(strlen($username) > $username_max_length) and !$users_already_exists) {
            $username = '';
        }  
    } else if (isset($_GET['update-user'])) {
        include 'connection.php';

        if($connection) {   
            $query = "SELECT * FROM users";
                $result = mysqli_query($connection, $query);
                if($result->num_rows) {
                    while($row = mysqli_fetch_assoc($result)) {
                        array_push($active_users, $row);
                    }
                    $username = $active_users[0]["username"];
                    $password = $active_users[0]["password"];
                }
        } else {
            die("Database connection failed");
        }           
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
    body {
        margin: 30px;
    }
    </style>
</head>
<body>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <div class="container">
        <div class="col-8">
            <div class="mb-3">
                <a type="button" class="<?php echo buttons_classes('sign-up'); ?>" href="<?php echo $_SERVER['SCRIPT_NAME'] . '?sign-up' ?>">Sign up</a>
                <a type="button" class="<?php echo buttons_classes('update-user'); ?>" href="<?php echo $_SERVER['SCRIPT_NAME'] . '?update-user' ?>">Update user</a>
            </div>
            <form <?php echo $_SERVER['SCRIPT_NAME'] ?> method="post" id="user-form">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value=<?php echo $username;?>>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo $password;?>" class="form-control">
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo $active_users[0]["id"]?>"/>
                <div class="mb-3">
                    <?php
                        if(isset($_GET['sign-up']) or (!isset($_GET['sign-up']) and !isset($_GET['update-user']))) {
                            echo '<input class="btn btn-primary" type="submit" name="submit" value="Submit">';
                        } else {
                            echo '<select class="form-select" aria-label="id select" id="users-update">'.active_users_options().'</select></br>';
                            echo '<input class="btn btn-primary" type="submit" name="update" value="Update">';
                        }
                    ?>
                </div>
            </form>

            <?php
            if(isset($_POST["submit"]) ) {   
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                //validation
                if(strlen($username) < $username_min_length) {
                    echo "El nombre de usuario debe tener $username_min_length caracteres o más. </br>";
                }
                if(strlen($username) > $username_max_length) {
                    echo "El nombre de usuario debe tener menos de $username_max_length caracteres. </br>";
                }
                if($users_already_exists) {
                    echo "El nombre de usuario ingresado ya está en uso. Por favor, escoja otro nombre de usuario. </br>";
                }
            }
            if(isset($_GET["user-updated"])) {
                echo "Usuario actualizado satisfactoriamente. </br>";
            }
            ?>
        </div>
    </div>
    <script>
        const users = <?php echo json_encode($active_users); ?>;
        const usersUpdateSelect = document.getElementById("users-update");
        const userNameInput = document.getElementById("username");
        const passwordInput = document.getElementById("password");
        const idInput = document.getElementById("id");
        

        if(usersUpdateSelect && userNameInput && passwordInput) {
            usersUpdateSelect.addEventListener("change", function(e){
                const selectedUser = users.find(user => user.id === usersUpdateSelect.value);
                userNameInput.value = selectedUser.username;
                passwordInput.value = selectedUser.password;
                idInput.value = usersUpdateSelect.value;
            })
        }
    </script>
</body>
</html>