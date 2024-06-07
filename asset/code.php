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


    if(isset($_POST["checking_delete"])){
        // print_r($_POST);
        $id = $_POST["todo_id"];
        $query = "DELETE FROM to_do_list WHERE id = '$id'";
        $query_run = mysqli_query($conn, $query);

        
        if($query_run){
            echo $return = "Successfully Deleted";

        }else
        echo $return = "Something Went Wrong.!";
    }


    if(isset($_POST['checking_add'])){
        $to_do = $_POST['to_do'];
        $due_date = $_POST['due_date'];
        $query = "INSERT INTO to_do_list (to_do,due_date,priority, `status`, updated_at, created_at ) VALUES('$to_do', '$due_date', '1', 'Active',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP )";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo $return = "Successfully Stored";
        }else{
            echo $return = "Something Went Wrong.!";
        }


    }