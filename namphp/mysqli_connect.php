<?php

// define constant variables


try{

    $con = new mysqli('localhost', 'root', '', 'demo');

    // encoded language
    mysqli_set_charset($con, 'utf8');



}catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
}