<?php 

$con = mysqli_connect( 'localhost', 'root', '', 'ajax' ) or die("Connection Failed.");
$sql = "SELECT * FROM student";
$data = mysqli_query($con, $sql);

$output = '';

if( mysqli_num_rows($data) > 0 ) {
    $output .= "<table border=1 width=100%>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Actions</td>
    </tr>";

    while($row = mysqli_fetch_assoc($data)) {
        $output .= "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td><button id='delete_data' data-id='{$row['id']}'>Delete</button>/<button id='edit_data' data-eid='{$row['id']}'>Edit</button></td>
        </tr>";
    }

    $output .= "</table>";

    echo $output;
}else {
    echo "NO Data Found!";
}








?>


