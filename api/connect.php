<?php

$connect = mysqli_connect("localhost","root","","voting") or die("connect failed!");

if($connect){
    echo "connected";
}
else{
    echo "Not connected";
}

?>