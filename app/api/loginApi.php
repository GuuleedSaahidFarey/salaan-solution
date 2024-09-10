<?php 
session_start();
header("Content-type:application/json");
include "../config/conn.php";

function checkLogin($conn){
    $dataArray=array();
    $data=array();
    // extract($_POST);
    $userName=$_POST['userName'];
    $password=$_POST['password'];

    $query="CALL login_sp('$userName','$password') ";
    $result=$conn->query($query);
    if ($result) {
    $row=mysqli_fetch_assoc($result);
    if (isset($row['MSG'])) {
        if ($row['MSG']=='deny') {
            $dataArray=array('status'=>false,'data'=>'UserName Or Password Incorrect');
        }else {
            $dataArray=array('status'=>false,'data'=>'User Locked By The Adminstrator');
        }
        
    }else {
  
        // foreach ($row as $key => $value) {
            // $_SESSION[$key]=$value;
         $_SESSION['my']=$userName;
        //  $user=$_SESSION['my'];
         
        // }
        // foreach ($row as $key => $value) {
        //     $_SESSION[$key]=$value;                        
        //     # code...
        // }
        $dataArray=array('status'=>true,'data'=>'success');
    }
    }else {
        $dataArray=array('status'=>false,'data'=>$conn->error);
    }
    echo json_encode($dataArray);
}




if (isset($_POST['action'])) {
    $action=$_POST['action'];
    $action($conn);
}







?>