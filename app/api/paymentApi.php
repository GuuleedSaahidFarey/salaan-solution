<?Php 
header("Content-type:application/json");
include "../config/conn.php";
session_start();
function  listAllSelling($conn){
    extract($_POST);
    $messageArray=array();
    $data=array();
    $query="SELECT * FROM `pyments`";
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



function printPyment($conn){
    extract($_POST);
    $messageArray=array();
    $query="SELECT * FROM `pyments` WHERE `id`='$id'";
    $result=$conn->query($query);
    if ($result) {
        $row=$result->fetch_assoc();
        $messageArray=array("status"=>true,"data"=>$row);
    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);
}



function deleteThisPyment($conn){
    extract($_POST);
    $messageArray=array();
    $query="DELETE FROM `pyments` WHERE `id`='$id'";
    $result=$conn->query($query);
    if ($result) {
        # code...
        $messageArray=array("status"=>true,"data"=>"Deleted this pyment");
    }else {
        $messageArray=array("status"=>false,"data"=>$conn->error);
    }
    echo json_encode($messageArray);
}

function roleUsers($conn){
    extract($_POST);
    $userName=$_SESSION['my'];
    $query="SELECT * FROM `users` WHERE `userName`='$userName'";
    $result=$conn->query($query);
    if ($result) {
        $row=$result->fetch_assoc();
        $role=$row['role'];
        if ($role) {
            $messageArray=array("status"=>true,"data"=>$role);
        }
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
