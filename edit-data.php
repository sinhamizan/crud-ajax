<?php 

$con = mysqli_connect('localhost', 'root', '', 'ajax');

$id = $_POST['id'];

$sql = "SELECT * FROM student WHERE id=${id}";
$result = mysqli_query($con, $sql);

$output = '';

if( mysqli_num_rows($result) > 0 ) {
    while( $row = mysqli_fetch_assoc( $result ) ) {
        $output .= "
            <input type='text' id='edit_id' value='{$row["id"]}' hidden>
            <input type='text' id='edit_name' value='{$row["name"]}'>
            <input type='email' id='edit_email' value='{$row["email"]}'>
            <input type='submit' value='Update' id='update'>
        ";
    }
    
    echo $output;
} else {
    echo "Not matched any data.";
}


?>