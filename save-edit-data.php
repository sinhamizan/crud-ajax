<?php 

$con = mysqli_connect('localhost', 'root', '', 'ajax');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "UPDATE student SET name='{$name}', email='{$email}' WHERE id=${id}";
$result = mysqli_query($con, $sql);

if($result) {
    echo 1;
}else{
    echo 0;
}

?>