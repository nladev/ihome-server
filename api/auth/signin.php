<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include_once '../../conf/connect.php';
        $sql = "Select * From users Where email='$email'";
        $response = mysqli_query($conn,$sql);

        $result = array();
        $result['login'] = array();

        if (mysqli_num_rows($response)===1) {
            $row = mysqli_fetch_assoc($response);
            $password_hash = $row['password'];
            if(password_verify($password,$password_hash)){
                $index['name'] = $row['name'];
                $index['email'] = $row['email'];
                $index['id'] = $row['id'];

                array_push($result['login'],$index);

                $result['success'] = "1";
                $result['message'] = "success";
                echo json_encode($result);

                mysqli_close($conn);
            }else{
                $result['success'] = "0";
                $result['message'] = "error";
                echo json_encode($result);

                mysqli_close($conn);
            }
        }
    }
?>