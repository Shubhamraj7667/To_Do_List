<?php

$conn = mysqli_connect("localhost","root","","to_do");

$query = "SELECT * FROM to_do_list ";
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0){

    $data = array();
    while($row = mysqli_fetch_assoc($query_run)){
        $data[] = $row;
    }
    header('Content-type: application/json');
    echo json_encode($data);
}else{
    header('Content-type: application/json');
    echo json_encode(array("message" => "No Record Found"));
}