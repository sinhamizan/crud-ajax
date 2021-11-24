<?php 

$con = mysqli_connect( 'localhost', 'root', '', 'ajax' ) or die("Connection Failed.");


$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO student(name, email) VALUE('${name}', '${email}')";
$result = mysqli_query($con, $sql);

if($result) {
    echo 1;
}else{
    echo 0;
}

?>