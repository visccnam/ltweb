<?php

$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "Điền tên email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "Điền mật khẩu";
}

if(empty($error)){
    // sql query
    $query = "SELECT id, firstName, lastName, email, password, profileImage FROM user WHERE email=?";
    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);

    // bind parameter
    mysqli_stmt_bind_param($q, 's', $email);
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)){
        // verify password
        if($password=== $row['password']){
            if($email=="admin@gmail.com"){
                session_start();

                // create session variable
                $_SESSION['userID'] = $row['id'];
                header("location: admin.php");
                exit();
            }else{
                session_start();

                // create session variable
               $_SESSION['userID'] = $row['id'];
                header("location: index.php");
                exit();
            }
        }
    }else{
        print "Chưa có tài khoản, vui lòng đăng kí!";
    }

}else{
    echo "Điền email và password để đăng nhập!";
}
