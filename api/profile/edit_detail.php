<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        include_once '../../conf/connect.php';

        $sql = "Update users Set name='$name',email='$email' Where id='$id' ";

            if (mysqli_query($conn, $sql)) {

                $result["success"] = "1";
                $result["message"] = "success";

                echo json_encode($result);
                mysqli_close($conn);
            }else{
                $result["success"] = "0";
                $result["message"] = "error";

                echo json_encode($result);
                mysqli_close($conn);
            }
    }
?>