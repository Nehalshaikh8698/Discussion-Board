<?php

include("../common/db.php");

if(isset($_POST['signup'])){
    echo "Username is ".$_POST['username']."<br/>";
    echo "Email is ".$_POST['email']."<br/>";
    echo "password is ".$_POST['password']."<br/>";
    echo "address is ".$_POST['address']."<br/>";

}
?>