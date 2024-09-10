<?php 
header("Content-type:application/json");
include "../config/conn.php";

function get_repourt_statement($conn){
    extract($_POST);
    $messageArray=array();
    $allData=array();
    $query="Call `get_repourt_statement`('$from','$to')";
    $result=$conn->query($query);
    if ($result) {
        while ($row=$result->fetch_assoc()) {
            $allData[]=$row;
        }
        $messageArray=array("status"=>true,"data"=>$allData);
    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);
}



if (isset($_POST['action'])) {
    $action=$_POST['action'];
    $action($conn);
}

?>