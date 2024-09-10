<?php
header("Content-type:application/json");
include "../config/conn.php";

session_start();

function regNewOrder($conn){
    extract($_POST);
  
    $messageArray=array();
   $username= $_SESSION['my'];
    $query="INSERT INTO `onlyone`(`name`, `model`, `size`, `color`, `descrip`,`price`,`user`,`namePerson`,`phone`, `type`) VALUES
    ('$name','$model','$size','$color','$descrip','$price','$username','$namePerson','$phone','$type') ";
    $result=$conn->query($query);
   if ($result) {
    $messageArray=array("status"=>true,"data"=>"Registered");
   }else {
    $messageArray=array("status"=>false,"data"=>$conn->error);
   }
   echo json_encode($messageArray);
}

function searchSelling($conn){
    extract($_POST);
    $messageArray=array();
    $data=array();
    $query="SELECT * FROM `onlyone` WHERE `id` LIKE '%$val%'  OR `namePerson`  LIKE '%$val%' OR `phone` LIKE '%$val%' OR `name` LIKE '%$val%' AND type='store'";
    $result=$conn->query($query);
    if ($result) {
        while ($row=$result->fetch_assoc()) {
            $data[]=$row;
        }
        $messageArray=array("data"=>true,"data"=>$data);
    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);

    }
    echo json_encode($messageArray);
}

function regpayment($conn){
    extract($_POST);
    // session_start();
    $messageArray=array();
   $username= $_SESSION['my'];
    $query="INSERT INTO `pyments`(`name`, `descrip`, `price`, `user`, `namePerson`, `phone`, `type`, `peyMethod`) VALUES
    ('$name','$descrip','$price','$username','$namePerson','$phone','$type','$peyMethod') ";
    $result=$conn->query($query);
   if ($result) {
    $messageArray=array("status"=>true,"data"=>"Approved");
   }else {
    $messageArray=array("status"=>false,"data"=>$conn->error);
   }
   echo json_encode($messageArray);
}

function  listAllSelling($conn){
    extract($_POST);
    $messageArray=array();
    $data=array();
    $query="SELECT * FROM `onlyone` WHERE `type`='store'";
    $result=$conn->query($query);
    if ($result) {
        while ($row=$result->fetch_assoc()) {
            $data[]=$row;
            $messageArray=array("status"=>true,"data"=>$data);
        }
    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);
}

function fetchRowInfo($conn){
  extract($_POST);
  $messageArray=array();
  $query="SELECT * FROM `onlyone` WHERE `id`='$id'";
  $result=$conn->query($query);
  if ($result) {
    $row=$result->fetch_assoc();
    $messageArray=array("status"=>true,"data"=>$row);
    
  }else {
    $messageArray=array("status"=>false,"data"=>$conn->error);
    
  }
  echo json_encode($messageArray);

}

function updateOrder($conn){
    extract($_POST);
    $username= $_SESSION['my'];
    $messageArray=array();
    $query="UPDATE `onlyone` SET `name`='$name',`model`='$model',`size`='$size',`color`='$color',`descrip`='$descrip',`price`='$price',`user`='$username',`namePerson`='$namePerson',`phone`='$phone',`type`='$type' WHERE `id`='$id'";
    $result=$conn->query($query);
    if ($result) {
        $messageArray=array("status"=>true,"data"=>"Updated");
    }else {
        $messageArray=array("status"=>true,"data"=>$conn->error);
        
    }
    echo json_encode($messageArray);

}

function deleteOrder($conn){
    extract($_POST);
    $messageArray=array();
    $query="DELETE FROM `onlyone` WHERE `id`='$id'";
    $result=$conn->query($query);
    if ($result) {
        $messageArray=array("status"=>true,"data"=>"deleted");

    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);

}


function checkUser($conn){
    extract($_POST);
   $messageArray=array();

    if (!isset($_SESSION['user']) || strlen($_SESSION['user']) === 0) {
    // Redirect to the login page
    // header("Location: login.php"); // Adjust the path to your actual login page
  $messageArray=array("status"=>true,"data"=>"logout")  ;// exit(); // Ensure no further code is executed after the redirect
    }else {
    $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);

// The rest of your code for logged-in users goes here


}

function deleteAllSelling($conn){
    extract($_POST);
    $messageArray=array();
    $query="DELETE FROM `onlyone` WHERE `type`='store'";
    $result=$conn->query($query);
    if ($result) {
        $messageArray=array("status"=>true,"data"=>"Deleted all selling info");
    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);
}

function roleUsers($conn){
    $messageArray=array();
    $username=$_SESSION['my'];
    $query="SELECT * FROM `users` WHERE `userName` ='$username'";
    $result=$conn->query($query);
    if ($result) {
        $row=$result->fetch_assoc();
        $role=$row['role'];
    }else {
        $messageArray=array("status"=>false,"data"=>"log");
    }

    
    if ($role==="") {
        # code...
        $messageArray=array("status"=>false,"data"=>"logg");
    }else if ($role) {
        # code...
        $messageArray=array("status"=>true,"data"=>$role);
    } else {
      
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);
}

if (isset($_POST['action'])) {
    $action=$_POST['action'];
    $action($conn);
}

?>