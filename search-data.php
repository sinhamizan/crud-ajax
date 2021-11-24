<?php 

$con = mysqli_connect('localhost', 'root', '', 'ajax') or die('Connection Failed!');

$search_data = $_POST['search_data'];

$sql = "SELECT * FROM student WHERE name LIKE '%{$search_data}%' or email LIKE '%{$search_data}%'";
$result = mysqli_query($con, $sql);
$output = '';

if( mysqli_num_rows( $result ) > 0 ) {
    $output .= "<table border=1 width=100%>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Actions</td>
    </tr>";

    while($row = mysqli_fetch_assoc($result)) {
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
    
} else {
    echo " No Record Matched!";
}



?>