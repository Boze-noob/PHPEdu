<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "my_first_php");
$str = $_REQUEST["str"];

$result = mysqli_query($conn, "SELECT * FROM registration where FNAME LIKE '%$str%'");

$data = array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);