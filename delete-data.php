<?php 

$con = mysqli_connect('localhost', 'root', '', 'ajax');

$id = $_POST['id'];
$sql = "DELETE FROM student WHERE id='${id}'";
$result = mysqli_query($con, $sql);

if ( $result ) {
    echo 1;
}else{
    echo 0;
}


?>