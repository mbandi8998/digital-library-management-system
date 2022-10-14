<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $registration_number = strtoupper($_POST['registration_number']);
    $phone_number = $_POST['phone_number'];
    $student_email = $_POST['student_email'];
    $initial_registration_number = strtoupper($_POST['initial_registration_number']);

    $sign_in_time = date("F j, Y, g:i a");
    $sign_out_time = "";

    $servername = "localhost";
    $root_username = "root";
    $password = "";
    $dbname = "library management system";
    
    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $root_username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "UPDATE `students` SET `First Name` = '$first_name', `Last Name` = '$last_name', `Registration Number` = '$registration_number', `Phone Number` = '$phone_number', `Student Email` = '$student_email' WHERE `Registration Number`=:initial_registration_number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':initial_registration_number' => $initial_registration_number,      
    ));


    header("Location:manage_students.php?successcode=1");

    
    
    
     
}
else {
    header("Location:choose_login.php");
}
?>