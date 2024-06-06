<?php


$conn = mysqli_connect("localhost","root","","to_do");

if(isset($_POST["checking_edit"])){

    $result_array = [];

    $todo_id = $_POST['todo_id'];
    $query = "SELECT *FROM to_do_list WHERE id = '$todo_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }else{
        echo $return = "No Record Found.!" ;
    }
    }


    if(isset($_PoST["checking_delete"])){
        $id = $_PoST["todo_id"];
        $query = "DELETE  FROM to_do_list WHERE id = $id";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo $return = "Successfully Deleted";

        }else
        echo $return = "Something Went Wrong.!";
    }