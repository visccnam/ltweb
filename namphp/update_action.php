<?php
include('mysqli_connect.php');
include('helper.php');
if(isset($_POST['firstName'])){
    $firstName=$_POST['firstName'];
    $LastName=$_POST['LastName'];
    $iduser=$_POST['iduser'];
    $ngaysinh=$_POST['ngaysinh'];
    $gender=$_POST['gender'];
    $result=mysqli_query($con,"update user set firstName='$firstName', lastName='$LastName',
                                        ngaysinh='$ngaysinh',gender='$gender' where id = $iduser");


}
else ('huhuhuhuhu');

