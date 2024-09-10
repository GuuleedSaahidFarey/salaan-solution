<?php

header("Content-type: application/json");
include '../config/conn.php';

//diwaan gelinta userska

function regisUsers($conn){
  extract($_POST);
  $messegeArrey=array();
  $errorErray=array();
  $fileName=$_FILES['imege']['name'];
  $fileType=$_FILES['imege']['type'];
  $fileSize=$_FILES['imege']['size'];
  $allowedImeges=["imege/jpg" , "imege/png","imege/jpeg"];
  $maxSize=5*1024 * 1024;
  if (in_array($fileType,$allowedImeges)) {
    if ($fileSize > $maxSize) {
      $errorErray[]=$fileSize/1024 ."mb files must be less then" . $maxSize/1024/1024 . "mb";
    }
  }else {
    $errorErray[]="this file is not allowed" . $fileType;
    
  }
if (!count($errorErray) <=0) {
  $userImege=$_FILES['imege']['name'];
  move_uploaded_file($_FILES['imege']['tmp_name'],"../img/" .$_FILES['imege']['name']);
  $query="INSERT INTO `users`( `userName`, `password`, `imeges`, `status`, `role`) VALUES ('$userName','$password','$userImege','Active','$role')";
  $result=$conn->query($query);
  if ($result) {
    $messegeArrey=array("status"=>true,"data"=>"user registered");
  }else {
    $messegeArrey=array("status"=>false,"data"=>$conn->error);
  }
  echo json_encode($messegeArrey);
}

}


//replace data in modal when clicking button update
function getUserInfo($conn){
  $messegeArrey=array();

 extract($_POST);
  $query= "SELECT   * from `users` where `id`='$id'";
  $resul=$conn->query($query);
  if ($resul) {
    $row = $resul->fetch_assoc();
    $messegeArrey=array("status"=>true,"data"=>$row);
    
  }else {
    $messegeArrey=array("status"=>false,"data"=>$conn->error);

  }
 echo json_encode($messegeArrey);

}

// displey data in the table /reading all data
function getUserList($conn){
    //variaples guud 
    $responseData =array();
    $arrayData= array();
   
     $query="SELECT * FROM `users`";
     $result2=$conn->query($query);
   
     if ($result2) {
       while ($row = $result2->fetch_assoc()) {
         $arrayData [] =$row;
   
       }
       $responseData = array ("status"=>true, "data"=>$arrayData);
     }
     else {
     
     $responseData=array("status"=>false,"data"=>$conn->error);
     }
     echo json_encode($responseData);

}

function updateUsers($conn){
  $messegeArreyy=array();
  extract($_POST);
  $messegeArrey=array();
  $errorErray=array();
  $fileName=$_FILES['imege']['name'];
  $fileType=$_FILES['imege']['type'];
  $fileSize=$_FILES['imege']['size'];
  $allowedImeges=["imege/jpg" , "imege/png","imege/jpeg"];
  $maxSize=5*1024 * 1024;
  $userImege=$_FILES['imege']['name'];
  move_uploaded_file($_FILES['imege']['tmp_name'],"../img/" .$_FILES['imege']['name']);

  $queryy="UPDATE `users` SET `userName`='$userName',`password`='$password',`imeges`='$userImege',`status`='Active',`role`='$role' WHERE `id`= '$id'";
  $resull=$conn->query($queryy);
  if ($resull) {
    $messegeArrey=array("status"=>true,"data"=>"Update Success");
  }else {
    $messegeArrey=array("status"=>false,"data"=>$conn->error);
  }
  echo json_encode($messegeArrey);
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




function deleteUserInfo($conn){
  $messegeArrey=array();
  extract($_POST);
  $query="DELETE FROM `users` WHERE `id`='$id'";
  $resul=$conn->query($query);
  if ($resul) {
    $messegeArrey=array("status"=>true,"data"=>"delete was success");
  }else {
    $messegeArrey=array("status"=>false,"data"=>$conn->error);
  }
  echo json_encode($messegeArrey);
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $action($conn);
   }
  //  elseif (isset($_POST['submit'])) {
  //   regisUsers($conn);
  //  }
   else{
    echo json_encode(array("status"=>false,"data"=>"action required"));
  

    }










?>