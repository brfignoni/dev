<?php
    function buttons_classes($button_type){
        global $filename_without_ext;
        if($filename_without_ext == $button_type) {
            if($filename_without_ext == 'login_delete') {
                return 'btn btn-danger';
            } else {
                return 'btn btn-success';
            }
            
        } else {
            return 'btn btn-secondary';
        }
    }
    function submit_value() {
        global $filename_without_ext;
        if($filename_without_ext == 'login_delete') {
            return 'Delete';
        } else if ($filename_without_ext == 'login_update') {
            return 'Update';
        } else if ($filename_without_ext == 'login_signup') {
            return 'Submit';
        } else {
            return 'Submit';
        }
    }
?>

<div class="mb-3">
    <a type="button" class="<?php echo buttons_classes('login_signup'); ?>" href="<?php echo $dir_path . '/login_signup.php'?>">Signup</a>
    <a type="button" class="<?php echo buttons_classes('login_delete'); ?>" href="<?php echo $dir_path . '/login_delete.php'?>">Delete</a>
    <a type="button" class="<?php echo buttons_classes('login_update'); ?>" href="<?php echo $dir_path . '/login_update.php'?>">Update</a>
</div>
<form <?php echo $_SERVER['PHP_SELF']?> method="post" id="user-form">

    <?php
    if(($filename_without_ext == 'login_delete' or $filename_without_ext == 'login_update') and $users_select) {
        echo '
        <div class="mb-3">
            <label for="user-id" class="form-label">User id</label>
            '.$users_select.'
        </div>
        ';
    }
    ?>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input <?php echo ($filename_without_ext == "login_delete" ? 'readonly': '')?> type="text" id="username" name="username" class="form-control" value="<?php echo $username; ?>" required minlength="<?php echo $username_min_length?>" maxlength="<?php echo $username_max_length?>">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Password</label>
        <input <?php echo ($filename_without_ext == "login_delete" ? 'readonly': '')?> type="password" id="password" name="password" value="<?php echo $password; ?>" class="form-control" required minlength="<?php echo $password_min_length?>" maxlength="<?php echo $password_max_length?>">
    </div>
    <input type="hidden" id="id" name="id"/>
    <div class="mb-3">
        <input <?php echo ($filename_without_ext == "login_delete" ? 'disabled': '')?> class="btn btn-primary" type="submit" name="submit" id="submit" value=<?php echo submit_value();?>>
    </div>
</form>
<?php
if(count($messages) > 0) {
    foreach ($messages as $message) {
        echo '
        <div class="alert alert-'.$message->type.'" role="alert">
        '.$message->message.'
        </div>
        ';
    }
}
?>
