<?php

require ('helper.php');

// error variable.
$error = array();

$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)){
    $error[] = "Điền tên đăng nhập";
}

$lastName = validate_input_text($_POST['LastName']);
if (empty($lastName)){
    $error[] = "Điền tên";
}

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "Điền email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "Điền mật khẩu";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)){
    $error[] = "Nhập lại mật khẩu";
}

$files = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/profile/', $files);


if(empty($error)) {
    // register a new user
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    require('mysqli_connect.php');


    // make a query
    $query = "INSERT INTO user (firstName, lastName, email, password, profileImage )";
    $query.="VALUES('$firstName', '$lastName', '$email', '$password', '$profileImage')";
    if($con->query($query)==TRUE){
//        session_start();

           // create session variable
//           $_SESSION['userID'] = mysqli_insert_id($con);

           header('location: login.php');
           exit();

    } else{
        print "Lỗi khi đăng kí!";
    }

    // initialize a statement
//    $q=$con->stmt_init();
//   if( $q ->prepare($query)){
//       $q->bind_param('sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage);
//       $q->execute();
//       if ($q->affected_rows == 1) {
//           session_start();
//
//           // create session variable
//           $_SESSION['userID'] = mysqli_insert_id($con);
//
//           header('location: login.php');
//           exit();
//       } else {
//           print "Lỗi khi đăng kí!";
//       }
//   }
//
} else{
    echo 'chưa được chứng thực ';
}


















