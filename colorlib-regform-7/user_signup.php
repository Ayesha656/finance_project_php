<?php

include('dbcon.php');

if(isset($_POST['signup'])){
    $username = $_POST['name'];
    $useremail = $_POST['email'];    
    $userpass = $_POST['pass'];
    $user_re_pass = $_POST['re_pass'];
    $selected_option_value = $_POST['sellist1'];

    if($userpass == $user_re_pass) {
        $query="INSERT INTO register (name, email, password, category) VALUES ('$username', '$useremail', '$userpass', '$selected_option_value')";
        
        $run = mysqli_query($conn, $query);

        if($run) {
            echo "<script>alert('Data inserted');</script>";
        } else {
            // Check for errors
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}

if(isset($_POST['signin'])){
    $username = $_POST['your_name'];
    $userpass = $_POST['your_pass'];

    $query = "SELECT * FROM register WHERE email='$username' AND password='$userpass'";
    $run2 = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run2);

    if($row == 1){
        echo "<script>alert('Data found');</script>";
    }
    else{
        echo "<script>alert('Data not found');</script>"; 
    }
}

?>
