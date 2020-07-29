
<?php
session_start();
include ('helper.php');

$user = array();
if(isset($_SESSION['userID'])){
    require ('mysqli_connect.php');
    $user = get_user_info($con, $_SESSION['userID']);
}

?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Bhaccasyoniztas Beach Resort Website Template</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<div id="background">
    <div id="page">
        <div id="header">
            <div id="logo">
                <a href="index.php"><img src="assets/logo.png" alt="LOGO" height="112" width="118"></a>
            </div>
            <div >
                <div class="dropdown bg-infor" style="float: right;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="userss">
                        <img class="img rounded-circle" style="width: 30px; height: 30px;" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png'; ?>" alt="">
                        <?php
                        if(isset($user['firstName'])){
                            printf('%s %s', $user['firstName'], $user['lastName'] );
                        }
                        ?>
                    </button>   
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="adminInfor.php" name="inforPage">Thông tin cá nhân</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>

                    </div>
                </div>
            </div>
            <div id="navigation">
                <ul>
                    <li >
                        <a href="admin.php">Home</a>
                    </li>
                    <li>
                        <a href="#" disabled>About</a>
                    </li>
                    <li>
                        <a href="#">Rooms</a>
                    </li>
                    <li>
                        <a href="#">Dive Site</a>
                    </li>
                    <li>
                        <a href="#">Food</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>